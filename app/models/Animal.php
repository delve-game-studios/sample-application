<?php

namespace App\Models;
use Interfaces\Model as ModelInterface;
use App\Helpers\Model as ModelHelper;

class Animal extends ModelHelper {
	protected $type;
	protected $name;
	protected $max_age;
	protected $common_traits;
}

?>