<?php

namespace App\Factories;
use App\Factories\ErrorHandlers\RepositoryNotFoundException;

class RepositoriesFactory extends Factory {

	/**
	* @property Factory::factories['repositories'] $repositories
	*/
	private $repositories;

	/**
	* Initialize the RepositoriesFactory
	**/
	public function init() {
		$this->repositories = $this->getAllParams();
	}


	/**
	* Which helper do you need ?
	* @param String $name
	* @return App\Repositories\Interfaces\Helper
	**/
	public function get($class, $arguments = []) {
		$classMap = explode('\\', $class);
		if(count($classMap) === 1) {
			$class = "App\\Repositories\\{$class}";
		}

		if(isset($this->repositories[$class])) {
			$classInstance = $class::getInstance($arguments);
			return $classInstance;
		}

		//put more apropriate error message here
		throw new RepositoryNotFoundException($class);
	}
}