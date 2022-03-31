<?php
class Database{
	
	private $host  = 'bd-ethan-exercice-tpa.mysql.database.azure.com';
    private $user  = 'ethan';
    private $password   = 'Chouffes.Biloutes';
    private $database  = 'ethan_db_tpa_exercice'; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);

		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>