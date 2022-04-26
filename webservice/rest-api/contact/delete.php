<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/Contact.php';
 
$database = new Database();
$db = $database->getConnection();
 
$contact = new Contact($db);
 
$data = json_decode(file_get_contents("php://input"), true);
$data = $data['contact'];

if(!empty($data["id"])) {
	$contact->id = $data["id"];
	if($contact->delete()){    
		http_response_code(200); 
		echo json_encode(array("message" => "Contact was deleted."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Unable to delete contact."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array(
        "message" => "Unable to delete contact. Data is incomplete." ,
        "Data" => $data, "ClassName" => get_class($data),
        "Type" => gettype($data),
        "ID" => $data["id"]
    ));
}
?>