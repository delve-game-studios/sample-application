<?php

namespace App\Helpers;
use App\Helpers\Interfaces\Helper;
use App\Helpers\Traits\SingletonPattern;

class Model extends Helper {
	use SingletonPattern;

	private function __construct() {}
}