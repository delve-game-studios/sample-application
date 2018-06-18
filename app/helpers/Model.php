<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Interfaces\Model as ModelInterface;
use App\Helpers\Traits\Model as ModelTrait;

abstract class Model implements ModelInterface {
	use ModelTrait;

	private $app;

	public function __construct(Application $app) {
		$this->app = $app;
	}
}

?>