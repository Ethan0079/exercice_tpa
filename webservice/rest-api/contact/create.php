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
// $data = file_get_contents("php://input");
// file_put_contents($filename, $data);
// print_r($data);

$data = $data['contact'];


if(!empty($data["firstname"]) && !empty($data["lastname"]) &&
!empty($data["age"]) && !empty($data["email"]) &&
!empty($data["tel_number"])){    

    $contact->firstname         = $data["firstname"];
    $contact->lastname          = $data["lastname"];
    $contact->age               = $data["age"];
    $contact->email             = $data["email"];	
    $contact->tel_number        = $data["tel_number"];
    
    if($contact->create()){         
        http_response_code(201);         
        echo json_encode(array("message" => "Contact was created."));
    } else{         
        http_response_code(503);        
        echo json_encode(array("Contact" => $contact));
        echo json_encode(array("message" => "Unable to create contact."));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array(
        "message" => "Unable to create contact. Data is incomplete." ,
        "Data" => $data, "ClassName" => get_class($data),
        "Type" => gettype($data),
        "Firstname" => $data["firstname"]
    ));


}
?>