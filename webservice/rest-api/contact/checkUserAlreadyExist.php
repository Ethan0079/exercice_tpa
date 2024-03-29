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
$data = $data['contact'];

if(!empty($data["email"])) {
    echo "email: " . $data["email"];
    $contact->email = $data["email"];	
    
    
    if($contact->checkExistByEmail()){         
        http_response_code(200);         
        echo json_encode(array("message" => "User already exist"));
    } else{
        http_response_code(404);        
        echo json_encode(array("message" => "User email not used"));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array(
        "message" => "Unable to check contact email. Data is incomplete." ,
        "Data" => $data, "ClassName" => get_class($data),
        "Type" => gettype($data),
        "Email" => $data["email"]
    ));


}
?>