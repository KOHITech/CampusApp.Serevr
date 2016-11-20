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
		public function close();
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

	class MySQLLinker implements iQueryBuilder {
		var $host;
		var $user;
		var $pass;
		var $connection;

		function __construct($host, $user, $pass, $database) {
			$this->$host = $host;
			$this->$user = $user;
			$this->$pass = $pass;
			$this->$database = $database;
		}

		public function connect() {
			$this->$connection = mysql_connect($host, $user, $pass);
			if(! $connection ) {
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db( $database );
		}

		public function close() {
			mysql_close($this->$connection);
		}

		public function select($tablename, $columns, $column = null, $value = null) {
			$sql = "SELECT %s FROM %s";
			$where_clause = "WHERE %s = %s";

			if ($column && $value) {
				$where_clause = sprintf($where_clause, $column, $value);
				$sql =  $sql . " " . $where_clause;
			}

			for ($i=0; $i < count($columns); $i++) { 
				$columns[$i] = "`" . $columns[$i] . "`";
			}

			$tmp_str = join(", ", $columns);
			$sql = sprintf($sql, $tmp_str, $tablename);

			$retval = mysql_query( $sql, $this->$connection );

			$table = new Table($tablename);

			while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
				$row_class = new Row($columns);
				foreach ($row as $key => $value) {
					$row_class->set($key, $value);
				}
				$table->add_row($row_class);
			}

			return $table;

		}
	}
	
?>