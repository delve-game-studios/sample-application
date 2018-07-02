<?php

namespace App\Controllers;
use App\Controllers\Controller as AbstractController;
use App\Helpers\Request;
use App\Helpers\Capsule;

class Animals extends AbstractController {

	public function index(Request $request) {
		$animalRepo = $this->getRepository('Animal');
		$animals = $animalRepo->getAll();
		$view = $this->getView();
		$view->setBreadcrumb();
		$view->setNavbar();
		$view->index($animals);
	}

	public function edit(Request $request) {
		$doct = Capsule::getInstance();
		$cap = Capsule::getInstance();
		$cap->getSchema()->drop('users');
	}
}