<?php

namespace App\Factories;
use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Traits\HasParams;
use App\Factories\Interfaces\FactoryInterface;

abstract class Factory implements FactoryInterface {
	use SingletonPattern;
	use HasParams;

	private function __construct() {
		$this->params = include(VENDOR . 'composer/autoload_classmap.php');
		$this->init();
	}
}