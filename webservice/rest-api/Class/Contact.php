<?php
function create(){
		
	$stmt = $this->conn->prepare("
		INSERT INTO ".$this->itemsTable."(`firstname`, `lastname`, `age`, `email`, `tel_number`)
		VALUES(?,?,?,?,?)");
	
	$this->firstname = htmlspecialchars(strip_tags($this->firstname));
	$this->lastname = htmlspecialchars(strip_tags($this->lastname));
	$this->age = htmlspecialchars(strip_tags($this->age));
	$this->email = htmlspecialchars(strip_tags($this->email));
	$this->tel_number = htmlspecialchars(strip_tags($this->tel_number));
	
	
	$stmt->bind_param("ssiis", $this->firstname, $this->lastname, $this->age, $this->email, $this->tel_number);
	
	if($stmt->execute()){
		return true;
	}
 
	return false;		 
}
?>