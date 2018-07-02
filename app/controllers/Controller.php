<?php

namespace App\Controllers;
use App\Factories\HelpersFactory;
use App\Factories\RepositoriesFactory;
use App\Factories\ViewsFactory;
use App\Helpers\Traits\SingletonPattern;

abstract class Controller {
	use SingletonPattern;

	/**
	* @property App\Factories\HelpersFactory
	**/
	private $helpersFactory;

	/**
	* @property App\Factories\RepositoriesFactory
	*/
	private $repositoriesFactory;

	/**
	* @property App\Views\View
	*/
	private $view;

	private function __construct() {
		$this->helpersFactory = HelpersFactory::getInstance();
		$this->repositoriesFactory = RepositoriesFactory::getInstance();
		$viewsFactory = ViewsFactory::getInstance();
		$viewName = preg_replace('#Controllers#', 'Views', get_called_class());
		$this->view = $viewsFactory->get($viewName);
	}

	/**
	* @return App\Factories\HelpersFactory
	**/
	public function getHelper($name) {
		return $this->helpersFactory->get($name);
	}

	/**
	* @return App\Factories\RepositoriesFactory
	**/
	public function getRepository($name) {
		return $this->repositoriesFactory->get($name);
	}

	/**
	* @return App\Factories\ViewsFactory
	*/
	public function getView() {
		return $this->view;
	}
}