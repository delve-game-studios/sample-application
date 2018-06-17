<?php

namespace App\Helpers;
use \App\Application;

class Router {

	private $routes = [];

	public function fetchRoutes() {
		$routes = include('/app/config/routes.php');
		if(is_array($routes) && !empty($routes)) {
			$this->routes = $routes;
		}
	}

	/**
	* Static route only
	*/
	public function matchRoute(Application $app) {
		$current_path = $_SERVER['REQUEST_URI'];

		try {
			$route = $this->routes[$current_path];
			$controller = $route['class'];
			$action = $route['action'];
			$params = !empty($route['params']) ? $route['params'] : [];

			$reflection = new \ReflectionClass($controller);
			$controller_instance = $reflection->newInstanceArgs([$app]);
			call_user_method_array($action, $controller_instance, $params);

		} catch (Exception $e) {
			throw new Exception("Error occured while processing your request", 404);
		}
	}
}

?>