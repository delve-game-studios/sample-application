<?php

namespace App\Controllers;
use App\Controllers\Controller as AbstractController;
use App\Helpers\Request;
use App\Helpers\Session;

class App extends AbstractController {

	public function index(Request $request) {
		$view = $this->getView();
		$view->setNavbar();
		$view->home();
	}

	public function notFound(Request $request) {
		$view = $this->getView();
		$view->setNavbar();
		$view->setParam('last_error_url', Session::getInstance()->getParam('last_error_url', '/'));
		$view->notFound();
	}
}