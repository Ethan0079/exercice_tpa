<?php
class Database{
	
	private $host  = 'bd-ethan-exercice-tpa.mysql.database.azure.com';
    private $user  = 'ethan';
    private $password   = "Chouffes.Biloutes";
    private $database  = "bd-ethan-exercice-tpa"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		// $conn->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-bundle.crt", NULL, NULL);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }

	// $con=mysqli_init();
	// mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL);
	// mysqli_real_connect($con, "bd-ethan-exercice-tpa.mysql.database.azure.com", "ethan@bd-ethan-exercice-tpa", "Chouffes.Biloutes", "bd-ethan-exercice-tpa", 3306);


}

// $host = 'bd-ethan-exercice-tpa.mysql.database.azure.com';
// $username = 'ethan@bd-ethan-exercice-tpa';
// $password = 'Chouffes.Biloutes';
// $db_name = 'bd-ethan-exercice-tpa';

// //Initializes MySQLi
// $conn = mysqli_init();

// mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

// // Establish the connection
// mysqli_real_connect($conn, 'bd-ethan-exercice-tpa.mysql.database.azure.com', 'ethan@bd-ethan-exercice-tpa', 'Chouffes.Biloutes', 'bd-ethan-exercice-tpa', 3306, NULL, MYSQLI_CLIENT_SSL);

// //If connection failed, show the error
// if (mysqli_connect_errno())
// {
//     die('Failed to connect to MySQL: '.mysqli_connect_error());
// }

?>