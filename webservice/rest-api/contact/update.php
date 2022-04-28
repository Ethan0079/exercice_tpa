<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/Contact.php';
 
$database = new Database();
$db = $database->getConnection();
 
$contact = new Contact($db);
 
$data = json_decode(file_get_contents("php://input"), true);
$data = $data['contact'];

if(!empty($data["id"]) && !empty($data["firstname"]) && 
!empty($data["lastname"]) && !empty($data["age"]) && 
!empty($data["email"]) && !empty($data["tel_number"])){ 
	
	$contact->id = $data["id"];
	$contact->firstname = $data["firstname"];
	$contact->lastname = $data["lastname"];
	$contact->age = $data["age"];
	$contact->email = $data["email"];
	$contact->tel_number = $data["tel_number"];
	
	if($contact->update()){     
		http_response_code(200);
		header("Location: /rest-api/contact/read?id=$contact->id");
		echo json_encode(array("message" => "Contact was updated."));
	} else {    
		http_response_code(503);     
		echo json_encode(array("message" => "Unable to update contact."));
	}
	
} else {
	http_response_code(400);    
    echo json_encode(array(
        "message" => "Unable to update contact. Data is incomplete." ,
        "Data" => $data, "ClassName" => get_class($data),
        "Type" => gettype($data),
        "Firstname" => $data["firstname"]
    ));
}
?>