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
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;
		$stmt.close();
	}
	
	function create(){
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->contactTable."(`firstname`, `lastname`, `age`, `email`, `tel_number`)
			VALUES(?,?,?,?,?)");
			
		$this->firstname = htmlspecialchars(strip_tags($this->firstname));
		$this->lastname = htmlspecialchars(strip_tags($this->lastname));
		$this->age = htmlspecialchars(strip_tags($this->age));
		$this->email = htmlspecialchars(strip_tags($this->email));
		$this->tel_number = htmlspecialchars(strip_tags($this->tel_number));

		$stmt->bind_param("ssiss", $this->firstname, $this->lastname, $this->age, $this->email, $this->tel_number);
		
		if($stmt->execute()){
			return true;
		}
		
		return false;
		$stmt.close();

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
		$this->tel_number = htmlspecialchars(strip_tags($this->tel_number));
	 
		$stmt->bind_param("ssissi", $this->firstname, $this->lastname, $this->age, $this->email, $this->tel_number, $this->id);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		$stmt.close();
	}
	
	function delete(){
		
		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->contactTable." 
			WHERE id = ?");
			
		$this->id = htmlspecialchars(strip_tags($this->id));
	 
		$stmt->bind_param("i", $this->id);
	 
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		$stmt.close();	 
	}
}
?>