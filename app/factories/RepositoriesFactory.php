<?php

namespace App\Factories;

class RepositoriesFactory extends Factory {

	/**
	* @property Factory::factories['repositories'] $repositories
	*/
	private $repositories;

	/**
	* Initialize the RepositoriesFactory
	**/
	public function init() {
		$this->repositories = $this->getParam('repositories', []);
	}


	/**
	* Which helper do you need ?
	* @param String $name
	* @return App\Repositories\Interfaces\Helper
	**/
	public function get($name, $arguments = []) {
		if(isset($this->repositories[$name])) {
			$class = $this->repositories[$name];
			$classInstance = $class::getInstance($arguments);
			return $classInstance;
		}

		//put more apropriate error message here
		throw new HelperNotFoundException($name);
	}
}