<?php
	function ConectaDB(){

		$server = 'localhost';
		$user = 'root';
		$password = '';
		$dbname = 'sis_corridas';


		$con = mysqli_connect($server, $user, $password, $dbname);

		// se houver erro ao conectar		
		if ($con->connect_error) {
			$erro = $con->connect_error;
			echo "<script> alert('Connection failed: ".$erro."');</script>";
		}

		return $con;
	}