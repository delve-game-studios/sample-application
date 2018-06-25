<?php

namespace App\Controllers;
use App\Controllers\Controller as AbstractController;
use App\Helpers\Request;

class Animals extends AbstractController {

	public function index(Request $request) {
		$animalRepo = $this->getRepository('Animal');
		$animals = $animalRepo->getAll();
		$view = $this->getView();
		$view->setBreadcrumb();
		$view->setNavbar();
		$view->index($animals);
	}

	public function read(Request $request) {

	}
}