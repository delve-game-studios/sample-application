<?php

namespace App\Helpers;
use App\Helpers\Traits\HasParams;
use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Interfaces\Helper;

class Request implements Helper {
	use SingletonPattern;
	use HasParams;

	/**
	* @property Boolean
	**/
	private $isPost;

	/**
	* @property Boolean 
	**/
	private $isAjax;

	private function __construct() {
		$this->isPost = false;
		$this->isAjax = false;
		$this->refresh();
	}

	/**
	* @return Boolean $isPost Checks if it's Post Request.
	**/
	public function isPost() {
		return $this->isPost;
	}

	/**
	* @return Boolean $isAjax Checks if the request is via AJAX
	**/
	public function isAjax() {
		return $this->isAjax;
	}

	/**
	* Refreshes the Request Helper
	**/
	public function refresh() {
		if(!empty($_POST)) {
			$this->isPost = true;
			$this->params['post'] = $_POST;

		}
		$this->params['get'] = $_GET;

		$this->isAjax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}

}