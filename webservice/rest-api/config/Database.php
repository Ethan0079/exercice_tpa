<?php
class Database{
	
	private $host  = 'bd-ethan-exercice-tpa.mysql.database.azure.com';
    private $user  = 'ethan@bd-ethan-exercice-tpa';
    private $password   = "Chouffes.Biloutes";
    private $database  = "bd-ethan-exercice-tpa"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password);

		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>