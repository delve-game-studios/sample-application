<?php

namespace App\Controllers;

use App\Controllers\Controller as AbstractController;
use App\Helpers\Request;
use App\Helpers\Session;
use App\Helpers\Router;

class App extends AbstractController
{

    public function index(Request $request)
    {
        // \App\Helpers\Console::getInstance()->migrate(); // do all available migrations
        $view = $this->getView();
        $view->setNavbar();
        $view->home();
    }

    public function notFound(Request $request)
    {
        $view = $this->getView();
        $view->setNavbar();
        $view->setParam('last_error_url', Session::getInstance()->getParam('last_error_url', '/'));
        $view->notFound();
    }

    public function testRoutes()
    {
        $router = Router::getInstance();
        $router->getRouteRegexFromURI();
    }
    
    public function read(Request $request)
    {
        var_dump($request);
        exit;
    }
}
