<?php

namespace App\Controllers;
use App\Controllers\Controller as AbstractController;
use App\Helpers\Request;

class App extends AbstractController {

	public function index(Request $request) {
		$view = $this->getView();
		$view->setNavbar();
		$view->home();
	}
}