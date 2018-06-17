<?php

namespace App;

class Application {

	public $config;

	public function init() {
		$this->fetchConfig();
		$router = new Helpers\Router();
		$router->fetchRoutes();
		$router->matchRoute($this);
	}

	public function fetchConfig() {
		$this->config = include('/app/config/config.php');
	}

}

?>