<?php

namespace App\Helpers\Traits;

trait SingletonPattern {

	/**
	* @static Object $instance
	**/
	public static $_instances;

	/**
	* @return Object $instance
	**/
	public static function getInstance($arguments = []) {
		$class = get_called_class();
		if(!isset(static::$_instances[$class])) {
			static::$_instances[$class] = !empty($arguments) ? new static($arguments) : new static();
		}
		return static::$_instances[$class];
	}
}