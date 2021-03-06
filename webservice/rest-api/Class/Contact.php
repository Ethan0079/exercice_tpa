<?php
class Contact {   
  
    public $id;
    public $firstname;
    public $lastname;
    public $age;
    public $email;   
    public $tel_number; 

	private $contactTable = "contact";   
    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function read(){	
		if($this->id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->contactTable." WHERE id = ?");
			$stmt->bind_param("i", $this->id);					
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->contactTable);		
		}		

		try {
			$stmt->execute();
			$result = $stmt->get_result();		
			return $result;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		} finally {
			$stmt->close();
		}
		
	}

	function create(){
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->contactTable."(`firstname`, `lastname`, `age`, `email`, `tel_number`)
			VALUES(?,?,?,?,?)");

		$this->firstname = htmlspecialchars(strip_tags($this->firstname));
		$this->lastname = htmlspecialchars(strip_tags($this->lastname));
		$this->age = htmlspecialchars(strip_tags($this->age));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->tel_number = strip_tags($this->tel_number);

		$stmt->bind_param("ssiss", $this->firstname, $this->lastname, $this->age, $this->email, $this->tel_number);
		
		try {
			$stmt->execute();
			// $stmt->get_result();
			$this->id = $this->conn->insert_id;
			// $this->id = 2;
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		} finally {
			$stmt->close();
		}

	}
		
	function update(){
	 
		$stmt = $this->conn->prepare("
			UPDATE ".$this->contactTable." 
			SET firstname= ?, lastname = ?, age = ?, email = ?, tel_number = ?
			WHERE id = ?");
		
		$this->id = htmlspecialchars(strip_tags($this->id));
		$this->firstname = htmlspecialchars(strip_tags($this->firstname));
		$this->lastname = htmlspecialchars(strip_tags($this->lastname));
		$this->age = htmlspecialchars(strip_tags($this->age));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->tel_number = strip_tags($this->tel_number);
	 
		$stmt->bind_param("ssissi", $this->firstname, $this->lastname, $this->age, $this->email, $this->tel_number, $this->id);

		try {
			$stmt->execute();
			$stmt->get_result();
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		} finally {
			$stmt->close();
		}
	}
	
	function delete(){
		
		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->contactTable." 
			WHERE id = ?");
			
		$this->id = htmlspecialchars(strip_tags($this->id));
	 
		$stmt->bind_param("i", $this->id);

		try {
			$stmt->execute();
			$stmt->get_result();
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		} finally {
			$stmt->close();
		}
	}

	function checkExistByEmail(){

		$stmt = $this->conn->prepare("SELECT * FROM ".$this->contactTable." WHERE email = ?");
	 
		$this->email = htmlspecialchars(strip_tags($this->email));
	 
		$stmt->bind_param("s", $this->email);
	 	
		try {
			$stmt->execute();
			$stmt->store_result();
			
			return $stmt->num_rows;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		} finally {
			$stmt->close();
		}
	}
}
?>