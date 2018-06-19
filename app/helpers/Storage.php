<?php

namespace App\Helpers;
use App\Helpers\Traits\HasApp;
use App\Application;

class Storage {
	use HasApp;

	private $storage_type;
	private $storage_path;
	private $available_media_types;

	public function __constructor(Application $app) {
		$this->setApp($app);
		$config = $this->app()->config();
		$this->storage_type = $config->getParam('storage::type');
		$this->storage_path = $config->getParam('storage::' . $this->storage_type);
		$available_media_types = $config->getParam('storage::' . $this->storage_type . '::media::extensions');
		foreach($config->getParam('storage::' . $this->storage_type) as $key => $value) {
			if(in_array($key, ['media', 'path'])) continue;
			$available_media_types[] = $value['extension'];
		}
	}

	public function getStorageType() {
		return $this->storage_type;
	}

	public function getStoragePath() {
		return $this->storage_path;
	}

	public function fetch($path) {
		$extension = end(explode('.', $path));

		if(in_array($extension, $available_media_types)) {
			// add functionality to return the URI to the given file in storage
		}

		return false;
	}

	public function store() {
		// make function to store a file using the storage type from request
	}

}

?>