<?php
class Database{
	
    public function getConnection(){
		require "config.php";
		$conn = new mysqli($host, $user, $password, $database);

		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>