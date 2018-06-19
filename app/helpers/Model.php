<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Interfaces\Model as ModelInterface;
use App\Helpers\Traits\Model as ModelTrait;
use App\Helpers\Traits\HasApp;

abstract class Model implements ModelInterface {
	use ModelTrait;
	use HasApp;

	public function __construct(Application $app) {
		$this->app = $app;
	}
}

?>