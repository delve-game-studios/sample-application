<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Traits\HasApp;

abstract class View {
	use HasApp;

	private $params;

	public function __construct(Application $app) {
		$this->app = $app;
	}

	public function setParams($params) {
		$this->params = $params;
		return $this;
	}

	public function getParams() {
		return $this->params;
	}
	
	public function render() {
		$template = $this->app()->getTemplate();

		// just a basic template engine it can be improved a lot
		foreach($this->getParams() as $key => $value) {
			$regex = sprintf('/({{\$%s}})/', $key);
			$value = htmlentities($value);
			$template = preg_replace($regex, $value, $template);
		}

		echo $template;
	}
}

?>