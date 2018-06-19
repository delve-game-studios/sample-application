<?php

namespace App;
use App\Helpers\Model;
use App\Helpers\Controller;

class Application {

	private $config;
	private $router;

	public function init() {
		$this->config = new Helpers\Config();
		$this->router = new Helpers\Router();
		$this->router->fetchRoutes();
		$this->router->matchRoute($this);
	}

	public function config() {
		return $this->config;
	}

	public function router() {
		return $this->router;
	}

	public function getModelInstance($model_name) {
		$model_namespace = sprintf('%s\%s', $this->config()->getParam('namespaces::models'), $model_name);
		$model = new $model_namespace($this);
		return $model;
	}

	public function getRepository($model_name, Model $model = null) {
		$repository_namespace = sprintf('%s\%s', $this->config()->getParam('namespaces::repositories'), $model_name);
		
		if(is_null($model)) {
			$model_namespace = sprintf('%s\%s', $this->config()->getParam('namespaces::models'), $model_name);
			$model = new $model_namespace($this);
		}

		return new $repository_namespace($model, $this);
	}

	public function getView() {
		$controller_name = $this->router->getController();
		$called_action = $this->router->getAction() . $this->config()->getParam('views::sufix', '');
		$view_namespace = sprintf('%s\%s\%s', $this->config()->getParam('namespaces::views'), $controller_name, $called_action);
		return new $view_namespace($this);
	}

	public function getTemplate() {
		$controller_name = $this->router()->getController();
		$called_action = $this->router()->getAction();
		$base_path = realpath('.') . '\\';
		$template_basepath = $this->config()->getParam('templates::path');
		$template_path = sprintf('%s%s/%s/%s.%s', $base_path, $template_basepath, $controller_name, $called_action, $this->config()->getParam('templates::extension'));
		$template = '';
		
		$template = file_get_contents($template_path);

		return $template;
	}

}

?>