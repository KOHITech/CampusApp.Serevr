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
		
		default:
			# code...
			break;
	}

?>