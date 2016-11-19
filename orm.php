<?php

	// Interfaces

	interface iRow {
		public function geta();
		public function get_json();
		public function get($column);
		public function set($column, $value);
	}

	interface iTable {
		public function get_rows();
		public function get_json();
		public function get_columns();
		public function get_table_name();
		public function add_row($row);
	}

	interface iQueryBuilder {
		public function connect();
		public function select($tablename, $columns, $column = null, $value = null);
		public function create($tablename, $columns, $row);
		public function delete($tablename, $column, $value);
		public function update($tablename, $columns, $row, $column, $value);
	}

	// Classes definitions

	class Row implements iRow {
		var $row;

		function __construct($columns = []) {
			if ($columns) {
				foreach ($columns as $column) {
					$this->$row[$column] = null;
				}
			}
		}

		public function geta() {
			return $this->$row;
		}

		public function get($column) {
			return $this->$row[$column];
		}

		public function set($column, $value) {
			$this->$row[$column] = $value;
		}

		public function get_json() {
			return json_encode($this->$row);
		}
	}

	class Table implements iTable {

		var $tablename;
		var $rows;

		function __construct($tablename) {
			$this->$tablename = $tablename;
			$this->$rows = [];
		}

		public function add_row($row) {
			array_push($this->rows, $row);
		}

		public function get_table_name() {
			return $this->$tablename;
		}

		public function get_rows() {
			return $this->$rows;
		}

		public function get_columns() {
			if (count($this->$rows) > 0) {
				return array_keys($this->rows[0]);
			}
			return null;
		}

		public function get_json() {
			$tmp = [];
			foreach ($this->$rows as $row) {
				array_push($tmp, $row->geta());
			}
			return json_encode($tmp);
		}
	}
	
?>