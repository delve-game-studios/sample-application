<?php

namespace App\Helpers;
use App\Helpers\Interfaces\Helper;

class Config implements Helper {
	use Traits\HasParams;
	use Traits\SingletonPattern;

	private function __construct() {
		$this->params = include(ROOT . 'app/config/config.php');
	}

}