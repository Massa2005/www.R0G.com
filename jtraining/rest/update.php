<?php

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  include_once 'database.php';
  include_once 'utente.php';


  $database = new Database();
  $db = $database->getConnection();

  $utente = new Utente($db);

  $data = json_decode(file_get_contents("php://input"));

  $utente->id = $data->id;
  $utente->password = $data->password;
  $utente->nome = $data->nome;
  $utente->eta = $data->eta;



  if ($utente->update()) 
   {
    http_response_code(200);
    echo json_encode(array("risposta" => "Utente aggiornato"));
   } 
  else 
   {
    http_response_code(503);            //503 servizio non disponibile
    echo json_encode(array("risposta" => "Impossibile aggiornare utente"));
   }
?>