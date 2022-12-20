<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Category;
use app\models\Product;

class SiteController extends Controller
{
    public function home()
    {
        $this->setLayout('homeLayout');
        return $this->render('home');
    }

    public function contact()
    {
        return $this->render('contact');
    }
    public function about()
    {
        return $this->render('about');
    }
    public function gallery(Request $request)
    {
        if ($request->isGet()) {
            $products = Product::getAll();
            $categories = Category::getAll();
            return $this->render(
                'gallery',
                [
                    'products' => $products,
                    'categories' => $categories
                ]
            );
        }
    }



    public function handlingContact(Request $request)
    {
        echo "<pre>";
        print_r($request->getBody());
        echo "</pre>";
        exit();
    }
}
