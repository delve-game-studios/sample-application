<?php

namespace App\Helpers;
use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Controller;
use App\Helpers\Interfaces\Helper;
use App\Factories\HelpersFactory;
use App\Factories\ControllersFactory;
use App\Helpers\Module;
use App\Application;

class Router implements Helper {
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

	private function __construct() {
		$routes = include(ROOT . 'app/config/routes.php');
		
		$moduleHelper = Module::getInstance();

		$routes = array_merge($routes, $moduleHelper->getModulesRoutes());

		if(is_array($routes) && !empty($routes)) {
			self::$routes = $routes;
		}
		
		self::$path = $_SERVER['REQUEST_URI'];
		if($route = &self::$routes[self::$path]) 
			$route = array_merge($route, ['params' => []]);
	}

	/**
	* Static route only
	* Uses the REQUEST_URI to match it to routes config.
	*/
	public function matchRoute() {
		$controllersFactory = ControllersFactory::getInstance();

		if($route = self::$routes[self::$path]) {
			self::$controller = end(explode('\\', $route['class']));
			self::$action = $route['action'];
			self::$params = $route['params'];
			
			array_unshift(self::$params, Request::getInstance());

			$controller = $controllersFactory->get(self::$controller);
			return call_user_func_array([$controller, self::$action], self::$params);
		}

		Session::getInstance()->set('last_error_url', self::$path);
		header('Location: /page404');
	}

	/**
	* Loads the routes from installed modules
	**/
	public function loadModuleRoutes() {
		$modules = include(ROOT . 'app/config/modules.php');

		foreach($modules as $name => $module) {
			$moduleRoutesFile = ROOT . $module . '\config\routes.php';
			if(file_exists($moduleRoutesFile)) {
				$routes = include($moduleRoutesFile);
				self::$routes = array_merge_recursive(self::$routes, $routes);
			}
		}
	}
}