<?php

namespace App\Controllers;
use \App\Helpers\Controller as ControllerHelper;

class App extends ControllerHelper {

	public function testViewAction() {
		$view = $this->app()->getView();
		$view->setParams(['phrase' => 'This is just an example don\'t judge by the <center> element in the HTML'])->render();
	}

	public function testModelAction() {
		$model = $this->app()->getModel('Animal');
		$model->setType('Bird');

		echo $model->getType();
	}

	public function testRepositoryAction() {
		$new_repository = $this->app()->getRepository('Animal');
		$new_repository->save();
		echo '<br>';
		$Animal = $this->app()->getModel('Animal');
		$Animal->setType('Bird');
		$old_repository = $this->app()->getRepository('Animal', $Animal);
		$old_repository->save();
	}

	public function testStorageAction() {
		echo 'make a test for storage to get a file from local storage';
	}
}

?>