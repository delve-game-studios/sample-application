<?php

namespace App\Controllers;
use \App\Helpers\Controller as ControllerHelper;

class App extends ControllerHelper {
	public function testAction() {
		$model = $this->app()->getModelInstance('Animal');
		$repository = $this->app()->getRepository('Animal', $model);
		echo $repository->delete();
	}
}

?>