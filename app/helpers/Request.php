<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Traits\HasApp;
use App\Helpers\Traits\HasParams;

class Request extends Config {
	use HasApp, HasParams;

	private $is_post;
	private $is_ajax;

	public function __construct(Application $app) {
		$this->setApp($app);
		$this->is_post = false;
		$this->is_ajax = false;
		$this->refresh();
	}

	public function isPost() {
		return $this->is_post;
	}

	public function isAjax() {
		return $this->is_ajax;
	}

	public function refresh() {
		if(!empty($_POST)) {
			$this->is_post = true;
			$this->params['post'] = $_POST;

		}
		$this->params['get'] = $_GET;

		$this->is_ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}

}

?>