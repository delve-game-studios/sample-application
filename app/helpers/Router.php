<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Traits\HasApp;

class Router {
	use HasApp;

	private $routes = [];
	private $controller;
	private $action;

	public function __construct(Application $app) {
		$this->setApp($app);
		$routes = include(ROOT . 'app/config/routes.php');
		if(is_array($routes) && !empty($routes)) {
			$this->routes = $routes;
		}
		$this->loadModuleRoutes();
	}

	/**
	* Static route only
	*/
	public function matchRoute() {
		$current_path = $_SERVER['REQUEST_URI'];

		if(!empty($this->routes[$current_path])) {
			$route = $this->routes[$current_path];
			$controller = $route['class'];
			$action = $route['action'];
			$params = !empty($route['params']) ? $route['params'] : [];
			$this->controller = end(explode('\\', $controller));
			$this->action = $action;

			$reflection = new \ReflectionClass($controller);
			$controller_instance = $reflection->newInstanceArgs([$this->app()]);
			call_user_method_array($action, $controller_instance, $params);
		} else {
			$this->app()->session()->set('last_error_url', $current_path);
			header('Location: /page404');
		}
	}

	public function getAction() {
		$action = preg_replace('/(Action|View)/', '', $this->action);
		return ucfirst($action);
	}

	public function getController() {
		return $this->controller;
	}

	public function loadModuleRoutes() {
		$modules = include(ROOT . 'app/config/modules.php');

		foreach($modules as $name => $module) {
			$module_routes_file = ROOT . $module . '\config\routes.php';
			if(file_exists($module_routes_file)) {
				$routes = include($module . '\\config\\routes.php');
				$this->routes = array_merge_recursive($this->routes, $routes);
			}
		}
	}
}

?>