<?php

namespace App\Controllers;
use \App\Helpers\Controller as ControllerHelper;

class App extends ControllerHelper {
	public function testAction() {
		$view = $this->app()->getView();
		$view->setParams(['phrase' => 'This is just an example don\'t judge by the <center> element in the HTML'])->render();
	}
}

?>