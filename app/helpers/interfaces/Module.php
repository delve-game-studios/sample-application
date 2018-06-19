<?php

namespace App\Helpers\Interfaces;
use App\Application;

interface Module {
	public function __construct(Application $app);
	public function controller();
}

?>