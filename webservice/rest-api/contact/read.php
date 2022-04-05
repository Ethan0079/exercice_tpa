<?php
header("Access-Control-Allow-Origin: https://snack-web-player.s3.us-west-1.amazonaws.com/");
header("Content-Type: application/json; charset=UTF-8");
header("Location: http://exercice-tpa/rest-api/contact/read.php");
header("Access-Control-Allow-Methods: READ");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../class/Contact.php';

$database = new Database();
$db = $database->getConnection();
 
$contact = new Contact($db);

$contact->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $contact->read();

if($result->num_rows > 0){    
    $itemRecords=array();
    $itemRecords["contact"]=array(); 
	while ($item = $result->fetch_assoc()) { 	
        extract($item); 
        $itemDetails=array(
            "id" => $id,
            "firstname" => $firstname,
            "lastname" => $lastname,
			"age" => $age,
            "email" => $email,            
			"tel_number" => $tel_number	
        ); 
       array_push($itemRecords["contact"], $itemDetails);
    }    
    http_response_code(200);     
    echo json_encode($itemRecords);
}else{     
    http_response_code(404);
    echo json_encode(
        array("message" => "No contact found.")
    );
} 
?>