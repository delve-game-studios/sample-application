<?php

namespace App\Helpers;

use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Controller;
use App\Helpers\Interfaces\Helper;
use App\Factories\HelpersFactory;
use App\Factories\ControllersFactory;
use App\Helpers\Module;
use App\Application;

/**
* @author Milan Vugrinchev
*/

class Router implements Helper
{
    use SingletonPattern;

    /**
    * @property Array $routes /app/config/routes.php
    */
    public static $routes;

    /**
    * @property String $controller
    **/
    public static $controller;

    /**
    * @property String $action
    **/
    public static $action;

    /**
    * @property Array $params
    **/
    public static $params = [];

    /**
    * @property String $path
    */
    public static $path;

    private function __construct()
    {
        $routes = include(ROOT . 'app/config/routes.php');
        
        $moduleHelper = Module::getInstance();

        $routes = array_merge($routes, $moduleHelper->getModulesRoutes());

        if (is_array($routes) && !empty($routes)) {
            self::$routes = $routes;
        }

        self::$routes = $this->getRegexpFromRoutes();
        
        self::$path = $_SERVER['REQUEST_URI'];
        if ($route = &self::$routes[self::$path]) {
            $route = array_merge($route, ['params' => []]);
        }
    }

    /**
    * Uses the REQUEST_URI to match it to routes config.
    * @return Mixed
    */
    public function matchRoute()
    {
        $controllersFactory = ControllersFactory::getInstance();

        foreach (self::$routes as $route) {
            if (isset($route['regex']) && preg_match("#{$route['regex']}#", self::$path, $matches)) {
                $request = Request::getInstance();

                self::$controller = !empty($matches['controller']) ? ucfirst($matches['controller']) : 'App';

                self::$action = !empty($matches['action']) ? $matches['action'] : 'index';

                self::$params = !empty($matches['params']) ? [$request, $matches['params']] : [$request];

                foreach ($matches as $key => $value) {
                    $request->setParam("get::{$key}", $value);
                }

                $controller = $controllersFactory->get(self::$controller);
                return call_user_func_array([$controller, self::$action], self::$params);
            }
        }

        if ($route = self::$routes[self::$path]) {
            $routeClassArr = explode('\\', $route['class']);
            self::$controller = end($routeClassArr);
            self::$action = $route['action'];
            self::$params = $route['params'];
            
            array_unshift(self::$params, Request::getInstance());
            $controller = $controllersFactory->get(self::$controller);
            return call_user_func_array([$controller, self::$action], self::$params);
        }
        
        Session::getInstance()->setParam('last_error_url', self::$path);
        header('Location: /404');
    }

    /**
    * Loads the routes from installed modules
    **/
    public function loadModuleRoutes()
    {
        $modules = include(ROOT . 'app/config/modules.php');

        foreach ($modules as $name => $module) {
            $moduleRoutesFile = ROOT . $module . '\config\routes.php';
            if (file_exists($moduleRoutesFile)) {
                $routes = include($moduleRoutesFile);
                self::$routes = array_merge_recursive(self::$routes, $routes);
            }
        }
    }

    public function getUrlFromPageName($pageName = false)
    {
        if (!$pageName) {
            return self::$path;
        }

        $routes = self::$routes;

        foreach ($routes as $path => $route) {
            if (isset($route['pageName']) && $route['pageName'] == $pageName) {
                return $path;
            }
        }

        return '/';
    }

    public function getRegexpFromRoutes()
    {
        $newRoutes = [];
        foreach (self::$routes as $uri => $route) {
            if (isset($route['constraints'])) {
                $uriArr = explode('/', trim($uri, '/'));
                foreach ($uriArr as $key => $part) {
                    if (isset($route['constraints'][$part])) {
                        $p = trim($part, ':');
                        $uriArr[$key] = "(?<{$p}>{$route['constraints'][$part]})";
                    } else {
                        $uriArr[$key] = "({$part})";

                        if (!isset($route['class']) && $key === 0) {
                            $uriArr[$key] = "(?<controller>{$part})";
                        }
                        if (!isset($route['action']) && $key === 2) {
                            $uriArr[$key] = "(?<action>{$part})";
                        }
                    }
                }
                $newRoutes[$uri] = array_merge($route, ['regex' => '/' . implode('/', $uriArr)]);
            } else {
                $newRoutes[$uri] = $route;
            }
        }

        return $newRoutes;
    }

    public function getRouteRegexFromURI()
    {
        var_dump(self::$routes);
        exit;
    }
}
