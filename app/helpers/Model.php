<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Interfaces\Model as ModelInterface;
use App\Helpers\Traits\Model as ModelTrait;
use App\Helpers\Traits\HasApp;

abstract class Model implements ModelInterface {
	use ModelTrait;
	use HasApp;

	public function __construct(Application $app) {
		$this->app = $app;
	}

	public function __call($method_name, $args) {
		if(in_array(substr($method_name, 0, 3), ['set', 'get'])) {
			$method_property = substr($method_name, 3);
			$property = preg_replace_callback('/([A-Z])+/', function($m) {
				return '_' . strtolower($m[1]);
			}, $method_property);
			$property = substr($property, 1);

			if(property_exists($this, $property)) {
				switch (substr($method_name, 0, 3)) {
					case 'set':
						$this->{$property} = $args[0];
						break;
					
					case 'get':
						return $this->{$property};
						break;
				}
			}
		} else {
			return call_user_method_array($method_name, $this, $args);
		}
	}
}

?>