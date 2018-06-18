<?php

namespace App\Models;
use Interfaces\Model as ModelInterface;
use App\Helpers\Model as ModelHelper;

class Animal extends ModelHelper {
	protected $type;
	protected $name;
	protected $max_age;
	protected $common_traits;

	public function getType() {
		return $this->type;
	}

	public function getName() {
		return $this->name;
	}

	public function getMaxAge() {
		return $this->max_age;
	}

	public function getCommonTraits() {
		return $this->common_traits;
	}
}

?>