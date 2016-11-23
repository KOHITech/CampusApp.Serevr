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
		public function create($tablename, $row);
		public function delete($tablename, $column, $value);
		public function update($tablename, $columns, $row, $column, $value);
	}

	// Classes definitions

	class Row implements iRow {
		private $row;

		function __construct($columns = []) {
			$this->row = array();
		}

		public function geta() {
			return $this->row;
		}

		public function get($column) {
			return $this->row[$column];
		}

		public function set($column, $value) {
			$this->row[$column] = $value;
		}

		public function get_json() {
			return json_encode($this->row);
		}
	}

	class Table implements iTable {

		private $tablename;
		private $rows;

		function __construct($tablename) {
			$this->tablename = $tablename;
			$this->rows = [];
		}

		public function add_row($row) {
			array_push($this->rows, $row);
		}

		public function get_table_name() {
			return $this->tablename;
		}

		public function get_rows() {
			return $this->rows;
		}

		public function get_columns() {
			if (count($this->rows) > 0) {
				return array_keys($this->rows[0]);
			}
			return null;
		}

		public function get_json() {
			$tmp = [];
			foreach ($this->rows as $row) {
				array_push($tmp, $row->geta());
			}
			return json_encode($tmp);
		}
	}

	class MySQLLinker implements iQueryBuilder {
		private $host;
		private $user;
		private $pass;
		private $database;
		private $connection;

		function __construct($host, $user, $pass, $database) {
			$this->host = $host;
			$this->user = $user;
			$this->pass = $pass;
			$this->database = $database;
		}

		public function connect() {
			$this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
			if(mysqli_connect_error()) {
				die('Could not connect: ' . mysqli_connect_errno() . '-'  . mysqli_connect_error());
			}
		}

		public function close() {
			mysqli_close($this->connection);
		}

		public function select($tablename, $columns, $column = null, $value = null) {
			$this->connect();

			$sql = "SELECT %s FROM %s";
			$where_clause = "WHERE `%s` = %s";

			if ($column && $value) {
				$where_clause = sprintf($where_clause, $column, $value);
				$sql =  $sql . " " . $where_clause;
			}
			
			if ($columns != "*") {
				for ($i=0; $i < count($columns); $i++) { 
					$columns[$i] = "`" . $columns[$i] . "`";
				}
				$tmp_str = join(", ", $columns);
			} else {
				$tmp_str = "*";
			}
			$sql = sprintf($sql, $tmp_str, $tablename);

			$retval = mysqli_query( $this->connection, $sql );

			if(! $retval ) {
				die('Could not get data: ' . mysqli_error());
			}

			$table = new Table($tablename);

			while($row = mysqli_fetch_assoc($retval)) {
				$row_class = new Row($columns);

				foreach ($row as $key => $value) {
					$row_class->set($key, $value);
				}
				
				$table->add_row($row_class);
			}

			mysqli_free_result($retval);

			$this->close();

			return $table;
		}

		public function create($tablename, $row) {
			$this->connect();

			$sql = "INSERT INTO %s (%s) VALUES (%s)";
			$sql = sprintf($sql, $tablename);

			$columns = array_keys($row->geta());
			for ($i=0; $i < count($columns); $i++) { 
				$columns[$i] = "`" . $columns[$i] . "`";
			}

			$tmp_str = join(", ", $columns);
			$sql = sprintf($sql, $tmp_str);

			$tmp_str = join(", ", array_values($row->geta()));
			$sql = sprintf($sql, $tmp_str);

			$retval = mysqli_query( $this->connection, $sql );

			if(! $retval ) {
				die('Could not insert data: ' . mysqli_error());
			}

			$this->close();
		}

		public function delete($tablename, $column, $value) {
			$this->connect();

			$sql = "DELETE FROM %s WHERE `%s` = %s";
			$sql = sprintf($sql, $tablename, $column, $value);

			$retval = mysqli_query( $this->connection, $sql );

			if(! $retval ) {
				die('Could not delete data: ' . mysqli_error());
			}

			$this->close();
		}

		public function update($tablename, $columns, $row, $column, $value) {
			$this->connect();

			$sql = "UPDATE %s SET %s WHERE `%s` = %s";
			$sql = sprintf($sql, $tablename);

			$tmp_str = [];
			foreach ($columns as $column) {
				array_push($tmp_str, "`$column` = " . $row[$column]);
			}

			$tmp_str = join(", ", $tmp_str);
			$sql = sprintf($sql, $tmp_str, $column, $value);

			$retval = mysqli_query( $this->connection, $sql );

			if(! $retval ) {
				die('Could not update data: ' . mysqli_error());
			}

			$this->close();
		}
	}
	
?>