<?php

namespace App\Controllers;
use \App\Helpers\Controller as ControllerHelper;

class App extends ControllerHelper {
	public function testAction() {
		print_r($this->app->config);
		echo 'The rabbit is running!';
	}
}

?>