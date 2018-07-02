<?php

namespace App\Factories;
use App\Factories\ErrorHandlers\ModuleNotFoundException;

class ModulesFactory extends Factory {

	/**
	* @property Factory::factories['modules'] $modules
	*/
	private $modules;

	/**
	* Initialize the ModulesFactory
	**/
	public function init() {
		$this->modules = $this->getAllParams();
	}


	/**
	* Which module do you need ?
	* @param String $name
	* @return App\Modules\Interfaces\Module
	**/
	public function get($class) {
		if(isset($this->modules[$class])) {
			$classInstance = $class::getInstance();
			return $classInstance;
		}

		//put more apropriate error message here
		throw new ModuleNotFoundException($class);
	}
}