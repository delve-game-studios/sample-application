<?php

namespace App\Factories;
use App\Factories\ErrorHandlers\ControllerNotFoundException;

class ControllersFactory extends Factory {

	/**
	* @property Factory::factories['controllers'] $controllers
	*/
	private $controllers;

	/**
	* Initialize the ControllersFactory
	**/
	public function init() {
		$this->controllers = $this->getParam('controllers', []);
	}


	/**
	* Which helper do you need ?
	* @param String $name
	* @return App\Controllers\Controller
	**/
	public function get($name, $arguments = null) {
		if(isset($this->controllers[$name])) {
			$class = $this->controllers[$name];

			if($arguments) {
				$controller = $class::getInstance($arguments);
			} else {
				$controller = $class::getInstance();
			}

			return $controller;
		}

		//put more apropriate error message here
		throw new ControllerNotFoundException($name);
	}
}