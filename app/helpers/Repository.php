<?php

namespace App\Helpers;
use App\Application;
use App\Helpers\Traits\HasApp;

abstract class Repository {
	use HasApp;

	private $table_name;
	private $model;

	public function __construct(Model $model, Application $app) {
		$this->app = $app;
		$this->model = $model;
		$model_name = get_class($model);

		$model_name_arr = explode('\\', $model_name);
		$table_name_raw = end($model_name_arr);
		$model_table_name = preg_replace_callback('/(_(\w))+/', function($m) {
			return ucfirst($m[2]);
		}, $table_name_raw);

		$table_name_plural = $this->plural($model_table_name);
		$this->table_name = strtolower($table_name_plural);
	}

	private function plural($word) {
		$letters = str_split($word);
		$last_letter = end($letters);
		$new_word = $word;
		if($last_letter == 'y') {
			array_pop($letters);
			$new_word = sprintf('%s%s', implode('', $letters), 'ie');
		}

		if(in_array($last_letter, ['s', 'x', 'h', 'z'])) {
			$new_word .= 'e';
		}

		$new_word .= 's';

		return $new_word;
	}

	public function getTableName() {
		return $this->table_name;
	}

	public function find($id) {
		echo 'using some ORM to fetch the row with ID: $id from the Database from table $this->table_name';
	}

	public function fetch($condition) {
		echo 'using some ORM and the condition variable to fetch matching records from the table';
	}

	public function fetchAll() {
		echo 'using some ORM to get all records from the table';
	}

	public function create() {
		echo 'using the model and ORM create a record inside the DB';
	}

	public function update() {
		echo "using the model and ORM update the record inside the DB";
	}

	public function delete() {
		echo 'using the model and ORM delete a record inside the DB';
	}

}

?>