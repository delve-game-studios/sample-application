<?php

namespace App\Repositories;
use App\Helpers\Repository;

class Animal extends Repository {

	public function getAllTerrestrials() {
		return $this->fetch([
			'type' => 'Terrestrial'
		]);
	}
	
	public function getAllBirds() {
		return $this->fetch([
			'type' => 'Bird'
		]);
	}
	
	public function getAllReptiles() {
		return $this->fetch([
			'type' => 'Reptile'
		]);
	}

	public function getAllAmphibians() {
		return $this->fetch([
			'type' => 'Amphibian'
		]);
	}

	public function save() {
		echo 'The Model was saved!';
	}

}

?>