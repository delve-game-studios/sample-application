<?php

namespace App\Factories;
use App\Factories\ErrorHandlers\HelperNotFoundException;

class HelpersFactory extends Factory {

	/**
	* @property Factory::factories['helpers'] $helpers
	*/
	private $helpers;

	/**
	* Initialize the HelpersFactory
	**/
	public function init() {
		$this->helpers = $this->getParam('helpers', []);
	}


	/**
	* Which helper do you need ?
	* @param String $name
	* @return App\Helpers\Interfaces\Helper
	**/
	public function get($name, $arguments = []) {
		if(isset($this->helpers[$name])) {
			$class = $this->helpers[$name];
			$classInstance = $class::getInstance($arguments);
			return $classInstance;
		}

		//put more apropriate error message here
		throw new HelperNotFoundException($name);
	}
}