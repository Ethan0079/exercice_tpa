<?php
class Database{
	
    public function getConnection(){
		require "config.php";
		// $conn = new mysqli($host, $user, $password, $database);
		// // mysqli_ssl_set($conn, NULL, NULL, NULL, "C:/BaltimoreCyberTrustRoot.crt.pem"), NULL);
		// $conn->ssl_set(NULL, NULL, "C:/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);

		//Initializes MySQLi
		$conn = mysqli_init();

		mysqli_ssl_set($conn,NULL,NULL, "C:/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);

		// Establish the connection
		mysqli_real_connect($conn, $host, $user, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL);



		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>