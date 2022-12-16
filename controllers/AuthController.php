<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exception\NotFoundException;
use app\middlewares\AdminMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\Category;
use app\models\LoginForm;
use app\models\Product;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        
        $this->registerMiddleware(new AdminMiddleware(['dashboard']));
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
                $response->redirect("/product?id=$edit");
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
    public function product(Request $request, Response $response)
    {
        $this->setLayout('main');
        
        if ($request->isPost()) {

            // $response->redirect('/dashsboard');
            // Product::update(['label' => 'Royal Ringo', 'price' => 124.89], ['id' => 100012]);
        } else {
            $idProd = $request->getBody()['id']?? throw new NotFoundException;
            $product = Product::findOne(['id' => $idProd]) ?? throw new NotFoundException;
            $product = $product ?? new Product;
            return $this->render(
                'product',
                [
                    'product' => $product,
                ]
            );
        }
    }
}
