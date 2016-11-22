<?php 
	$query = $_GET["query"];

	require "orm.php";

	$linker = new MySQLLinker("localhost", "root", "", "kohi_db");

	switch ($query) {
		case 'select':
			$tablename = $_GET["tablename"];
			$columns = $_GET["columns"];
			$where = $_GET["where"];

			$columns = explode(";", $columns);
			$where = explode("=", $where);

			$table = $linker->select($tablename, $columns, $where[0], $where[1]);

			echo $table->get_json();
			break;
		
		default:
			# code...
			break;
	}

?>