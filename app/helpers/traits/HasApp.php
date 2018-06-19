<?php

namespace App\Helpers\Traits;
use App\Application;

trait HasApp {
	private $app;
	protected function app() {
		return $this->app;
	}
}

?>