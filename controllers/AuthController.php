<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exception\ForbiddenException;
use app\core\exception\NotFoundException;
use app\core\middlewares\AuthMiddleware;
use app\middlewares\AdminMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\Category;
use app\models\LoginForm;
use app\models\Product;
use app\models\ProductUpdate;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {

        $this->registerMiddleware(new AdminMiddleware(['dashboard','createProduct','editProduct']));
        $this->registerMiddleware(new AuthMiddleware([''],['login','register']));
    }

    public function logout(Request $request, Response $response)
    {
        if ($request->isGet()) {
            Application::$app->logout();
            $response->redirect('/');
        }
    }
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        $this->setLayout('Auth');
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        $this->setLayout('Auth');
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Registration Done');
                Application::$app->response->redirect('/');
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function dashboard(Request $request, Response $response)
    {
        $this->setLayout('main');

        if ($request->isPost()) {
            extract($request->getBody());
            if (!empty($edit)) {
                $response->redirect("/editProduct?id=$edit");
                return;
            } else if (!empty($delete)) {
                if (Product::delete(['id' => $delete])) {
                    Application::$app->session->setFlash('deleted', 'Product has been deleted');
                }
            } else {
                throw new NotFoundException;
            }
        }
        $products = Product::getAll(true);
        $labels = (new Product())->labels();
        return $this->render(
            'dashboard',
            [
                'products' => $products,
                'columns' => $labels
            ]
        );
    }
    public function createProduct(Request $request, Response $response)
    {
        $this->setLayout('main');
        $product = new Product();

        if ($request->isPost()) {
            $body = $request->getBody();
            $body['image'] = $_FILES['image']['name'] ?? '';
            $product->loadData($body);
            $product->validate();
            if ($product->validate() && $this->uploadImage() && $product->save()) {
                Application::$app->session->setFlash('created', 'a Product has been created');
                $response->redirect("/dashboard");
            }
        }
        return $this->render(
            'product',
            [
                'product' => $product,
                'cat_ds' => Category::class,
                'label_column' => 'label',
                'FK' => 'categoryId'

            ]
        );
    }
    public function editProduct(Request $request, Response $response)
    {
        $this->setLayout('main');
        $product = new ProductUpdate();

        if ($request->isPost()) {

            $idProd = Application::$app->session->getFlash('idProd') ?? $response->redirect('/dashboard');
            $product->loadData($request->getBody());
            $productOld = ProductUpdate::findOne(['id' => $idProd]);

            if (!$productOld) {
                throw new \Exception("Error Processing Request", 400);
            }

            if (!empty($_FILES['image']['name'])) {
                $product->image = $_FILES['image']['name'];
                $this->uploadImage();
            }
            if ($product->validate()) {
                if (Product::update($product->changes($productOld), ['id' => $idProd])) {
                    Application::$app->session->setFlash('edited', "Product with id $idProd has been Updated");
                }
                $response->redirect("/dashboard");
            }
        } else {
            $idProd = $request->getBody()['id'] ?? throw new NotFoundException;
            $product = Product::findOne(['id' => $idProd]);
            if (!$product) {
                throw new \Exception("Error Processing Request", 400);
            }
            Application::$app->session->setFlash('idProd', $idProd);
        }

        return $this->render(
            'product',
            [
                'product' => $product,
                'cat_ds' => Category::class,
                'label_column' => 'label',
                'FK' => 'categoryId'
            ]
        );
    }

    private function uploadImage()
    {

        if (!move_uploaded_file($_FILES['image']['tmp_name'], Application::$ROOT_DIR . '/public/uploads/' . $_FILES['image']['name'])) {
            exit;
        }
        return true;
    }
}
