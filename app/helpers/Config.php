<?php

namespace App\Helpers;
use App\Helpers\Traits\HasParams;

class Config {
	use HasParams;

	public function __construct() {
		$this->params = include(ROOT . 'app/config/config.php');
	}

}

?>