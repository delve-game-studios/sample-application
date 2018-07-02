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
		$this->views = $this->getAllParams();
	}


	/**
	* Which helper do you need ?
	* @param String $name
	* @return App\Views\View
	**/
	public function get($class, $arguments = null) {
		$classMap = explode('\\', $class);
		if(count($classMap) === 1) {
			$class = "App\\Views\\{$class}";
		}
		
		if(isset($this->views[$class])) {

			if($arguments) {
				$view = $class::getInstance($arguments);
			} else {
				$view = $class::getInstance();
			}

			return $view;
		}

		//put more apropriate error message here
		throw new ViewNotFoundException($class);
	}
}