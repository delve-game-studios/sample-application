<?php

namespace App\Factories;
use App\Factories\ErrorHandlers\ViewNotFoundException;

class ViewsFactory extends Factory {

	/**
	* @property Factory::factories['views'] $views
	*/
	private $views;

	/**
	* Initialize the ViewsFactory
	**/
	public function init() {
		$this->views = $this->getParam('views', []);
	}


	/**
	* Which helper do you need ?
	* @param String $name
	* @return App\Views\View
	**/
	public function get($name, $arguments = null) {
		if(isset($this->views[$name])) {
			$class = $this->views[$name];

			if($arguments) {
				$controller = $class::getInstance($arguments);
			} else {
				$controller = $class::getInstance();
			}

			return $controller;
		}

		//put more apropriate error message here
		throw new ViewNotFoundException($name);
	}
}