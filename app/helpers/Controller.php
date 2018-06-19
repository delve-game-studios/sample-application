<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Traits\HasApp;

abstract class Controller {
	use HasApp;

	public function __construct(Application $app) {
		$this->app = $app;
	}

	public function __call($method_name, $args) {
		if(method_exists($this, $method_name)) {
			return \call_user_method_array($method_name, $this, $args);
		} else {
			$action_name = \preg_replace_callback("/(\-(\w))+/", function($m) {
				return ucfirst($m[2]);
			}, $method_name);

			if(method_exists($this, $action_name)) {
				return \call_user_method_array($action_name, $this, $args);
			}
		}

		throw new \Exception("Action does not exists");
	}

}


?>