<?php

namespace App\Factories;
use App\Factories\ErrorHandlers\HelperNotFoundException;

class HelpersFactory extends Factory {

	/**
	* Initialize the HelpersFactory
	**/
	public function init() {
		$this->helpers = $this->getAllParams();
	}


	/**
	* Which helper do you need ?
	* @param String $name
	* @return App\Helpers\Interfaces\Helper
	**/
	public function get($class, $arguments = []) {
		$classMap = explode('\\', $class);
		if(count($classMap) === 1) {
			$class = "App\\Helpers\\{$class}";
		}
		
		if(isset($this->helpers[$class])) {
			$classInstance = $class::getInstance($arguments);
			return $classInstance;
		}

		//put more apropriate error message here
		throw new HelperNotFoundException($name);
	}
}