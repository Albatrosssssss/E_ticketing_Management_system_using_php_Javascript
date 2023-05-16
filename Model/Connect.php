<?php 
	function connect() {
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "user";
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		return $conn;
	}
?>