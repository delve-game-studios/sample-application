<?php

namespace App\Helpers;
use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Traits\HasConfig;
use App\Helpers\Interfaces\Helper;

class Storage implements Helper {
	use SingletonPattern;
	use HasConfig;

	/**
	* @property String $storageType
	**/
	private $storageType;
	
	/**
	* @property String $storagePath
	**/
	private $storagePath;

	/**
	* @property Array $availableMediaTypes
	**/
	private $availableMediaTypes;

	private function __construct() {
		$config = $this->getConfig();
		$this->storageType = $config->getParam('storage::type');
		$this->storagePath = $config->getParam('storage::' . $this->storageType);
		$this->availableMediaTypes = $config->getParam('storage::' . $this->storageType . '::media::extensions');
		foreach($config->getParam('storage::' . $this->storageType) as $key => $value) {
			if(in_array($key, ['media', 'path'])) continue;
			$this->availableMediaTypes[] = $value['extension'];
		}
	}

	/**
	* @return String $storageType
	**/
	public function getStorageType() {
		return $this->storageType;
	}

	/**
	* @return String $storagePath
	**/
	public function getStoragePath() {
		return $this->storagePath;
	}

	/**
	* @param String $path Local path for the file
	* @return String Url for the file
	**/
	public function fetch($path) {
		$extension = end(explode('.', $path));

		if(in_array($extension, $this->availableMediaTypes)) {
			// add functionality to return the URI to the given file in storage
		}

		return;
	}

	/**
	* Stores the file from request
	**/
	public function store() {
		// make function to store a file using the storage type from request
	}

}