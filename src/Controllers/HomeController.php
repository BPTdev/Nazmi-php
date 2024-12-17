<?php

namespace App\Controllers;

use App\Router\Router;

class HomeController extends Controller
{
    public function index(array $params=null): void
    {

        $router = Router::getInstance();
        $this->view('site/index', compact('router'));
    }

}
