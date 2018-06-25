<?php

namespace App;
use App\Factories\HelpersFactory;
use App\Helpers\Traits\SingletonPattern;


class Application {
	use SingletonPattern;

	/**
	* @property \App\Helpers\Router
	*/
	private $router;

	private function __construct() {
		/**
		* @var App\Helpers\Factories\HelperFactory
		*/
		$factory = HelpersFactory::getInstance();

		$this->router = $factory->get('Router');
	}

	public function exec() {
		$this->router->matchRoute();
	}
}