<?php

namespace App\Helpers\Traits;

trait Model {
	protected $id;
	public function getId() {
		return $this->id;
	}
}

?>