<?php

namespace App;
use App\Helpers\Model;

class Application {

	private $config;

	public function init() {
		$this->config = new Helpers\Config();
		$router = new Helpers\Router();
		$router->fetchRoutes();
		$router->matchRoute($this);
	}

	public function getConfig() {
		return $this->config;
	}

	public function getModelInstance($model_name) {
		$model_namespace = sprintf('%s\%s', $this->config->getParam('namespaces::models'), $model_name);
		$model = new $model_namespace($this);
		return $model;
	}

	public function getRepository($model_name, Model $model = null) {
		$repository_namespace = sprintf('%s\%s', $this->config->getParam('namespaces::repositories'), $model_name);
		
		if(is_null($model)) {
			$model_namespace = sprintf('%s\%s', $this->getConfig()->getParam('namespaces::models'), $model_name);
			$model = new $model_namespace($this);
		}

		return new $repository_namespace($model);
	}

}

?>