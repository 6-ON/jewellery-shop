<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

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
    public function gallery()
    {
        return $this->render('gallery');

    }

    

    public function handlingContact(Request $request)
    {
        echo "<pre>";
        print_r($request->getBody());
        echo "</pre>";
        exit();
    }

}