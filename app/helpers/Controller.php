<?php

namespace App\Helpers;

use App\Helpers\Interfaces\Helper;
use App\Helpers\Traits\SingletonPattern;

class Controller implements Helper
{
    use SingletonPattern;

    private function __construct()
    {
    }
}
