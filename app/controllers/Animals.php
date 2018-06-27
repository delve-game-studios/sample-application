<?php

namespace App\Controllers;
use App\Controllers\Controller as AbstractController;
use App\Helpers\Request;
use App\Helpers\Doctrine;

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
		$doct = Doctrine::getInstance();
		var_dump($doct);exit;
	}
}