<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $p = ['name'=>"amine"];
        return $this->render('home',$p);
    }

    public function contact()
    {
        return $this->render('contact');

    }

    public function handlingContact(Request $request)
    {
        echo "<pre>";
        print_r($request->getBody());
        echo "</pre>";
        exit();
    }

}