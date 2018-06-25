<?php

namespace App\Views;
use App\Helpers\Traits\SingletonPattern;
use App\Factories\HelpersFactory;
use App\Helpers\Template;
use App\Helpers\Config;

abstract class View {
	use SingletonPattern;

	private $params = [];

	private $template;

	private function __construct() {
		$this->setParam('navbar', '');
		$this->setParam('breadcrumb', '');
		$this->setParam('headerTitle', Template::getTitle());
	}

	public function setParams($params) {
		$this->params = $params;
		return $this;
	}

	public function setParam($paramName, $paramValue) {
		$this->params[$paramName] = $paramValue;
		return $this;
	}

	public function getParams() {
		return $this->params;
	}

	public function setTemplate($template) {
		$this->template = $template;
		return $this;
	}

	public function getTemplate() {
		return $this->template;
	}

	public function getTemplateHelper($method) {
		$arguments = [
			'class' => get_called_class(),
			'method' => $method
		];
		return HelpersFactory::getInstance()->get('Template', $arguments);
	}
	
	public function render() {
		$template = $this->getTemplate();

		// just a basic template engine it can be improved a lot
		foreach($this->getParams() as $key => $value) {
			$regex = sprintf('/({{\$%s\|?(encoded)?}})/', $key);
			$template = preg_replace_callback($regex, function($m) use ($value){
				if(!empty($m[2])) {
					switch ($m[2]) {
						case 'encoded':
							$value = htmlentities($value);
						break;
					}
				}
				return $value;
			}, $template);
		}

		echo $template;
	}

	public function setNavbar() {
		$this->setParam('navbar', Template::getNavbar());
	}

	public function setBreadcrumb() {
		$this->setParam('breadcrumb', Template::getBreadcrumb());
	}
}