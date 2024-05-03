<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");					// indica che usa il metodo post
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once 'database.php';
include_once 'utente.php';
 
$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
$data = json_decode(file_get_contents("php://input"));			// prende il contenuto URL e lo converte da  JSON a PHP		
	

								
if( !empty($data->id) && !empty($data->password) && !empty($data->nome) && !empty($data->eta) ){
    $utente->id = $data->id;
    $utente->password = $data->password;
    $utente->nome = $data->nome;
    $utente->eta = $data->eta;
 
    if($utente->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Utente creato correttamente."));
       }
    else{
        http_response_code(503);				  		//503 servizio non disponibile
        echo json_encode(array("message" => "Impossibile creare utente."));
       }
   }
else{
    http_response_code(400); 							//400 bad request
    echo json_encode(array("message" => "Impossibile creare utente i dati sono incompleti."));
   }
?>