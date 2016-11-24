<?php
	if (isset($_GET["query"])) {
		$query = $_GET["query"];
	} elseif (isset($_POST["query"])) {
		$query = $_POST["query"];
	}

	require "orm.php";

	$linker = new MySQLLinker("localhost", "kohi", "kohi", "kohi_db");

	switch ($query) {
		case 'select':
			$tablename = $_GET["tablename"];
			$columns = $_GET["columns"];
			if ($columns != "*") {
				$columns = explode(";", $columns);
			}

			if (isset($_GET["where"])) {
				$where = $_GET["where"];
				$where = explode("=", $where);
				if ( ! is_numeric($where[1])) {
					$where[1] = '"' . $where[1] . '"';
				}
				$table = $linker->select($tablename, $columns, $where[0], $where[1]);
			} else {
				$table = $linker->select($tablename, $columns);
			}
			
			echo $table->get_json();
			break;
		
		case 'create':
			$tablename = $_POST["tablename"];
			$row = $_POST["row"];

			$row = explode(";", $row);
			for ($i=0; $i < cout($row); $i++) { 
				$row[i] = explode("=", $row[i]);
			}

			$row_class = new Row();
			foreach ($row as $item) {
				if ( ! is_numeric($item[1])) {
						$item[1] = '"' . $item[1] . '"';
				}
				$row_class->set($item[0], $item[1]);
			}

			$linker->create($tablename, $row_class);
			break;
		
		case 'delete':
			$tablename = $_POST["tablename"];
			$where = $_POST["where"];

			$where = explode("=", $where);
			if ( ! is_numeric($where[1])) {
				$where[1] = '"' . $where[1] . '"';
			}

			$linker->delete($tablename, $where[0], $where[1]);
			break;

		case 'update':
			$tablename = $_POST["tablename"];
			$where = $_POST["where"];
			$row = $_POST["row"];

			$where = explode("=", $where);
			if ( ! is_numeric($where[1])) {
				$where[1] = '"' . $where[1] . '"';
			}

			$row = explode(";", $row);
			for ($i=0; $i < cout($row); $i++) { 
				$row[i] = explode("=", $row[i]);
			}

			$row_class = new Row();
			foreach ($row as $item) {
				if ( ! is_numeric($item[1])) {
						$item[1] = '"' . $item[1] . '"';
				}
				$row_class->set($item[0], $item[1]);
			}

			$linker->update($tablename, $row_class, $where[0], $where[1]);
			break;

		default:
			# code...
			break;
	}

?>