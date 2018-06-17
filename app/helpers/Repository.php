<?php

namespace App\Helpers;

abstract class Repository {
	private $table_name;
	private $model;


	public function __construct(Model $model) {
		$this->model = $model;
		$model_name = $model::class;

		$model_name_arr = explode('\\', $model_name);
		$table_name_raw = end($model_name_arr);
		$this->table_name = preg_replace_callback('/(_(\w))+/', function($m) {
			return ucfirst($m[2]);
		}, $table_name_raw);
	}

	public function getTableName() {
		return $this->table_name;
	}

	public function getSQL() {
		return $this->raw_sql;
	}

	public function find($id) {
		// using some ORM to fetch the row with ID: $id from the Database from table $this->table_name
	}

	public function fetch($condition) {
		// using some ORM and the condition variable to fetch matching records from the table
	}

	public function fetchAll() {
		// using some ORM to get all records from the table
	}

}

?>