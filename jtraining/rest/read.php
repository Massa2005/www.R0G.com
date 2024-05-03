<?php                // preleva dei dati dal database e li restituisce in formato json 

  header("Access-Control-Allow-Origin: *");                	// tutti possono accedere alla pagina
  header("Content-Type: application/json; charset=UTF-8");	// restituisce in formato json UTF-8

  include_once 'database.php';
  include_once 'task.php';

  $database = new Database();                        		// crea un oggetto Database e si collega al database
  $db = $database->getConnection();

  $task = new Task($db);       
  
  $data = json_decode(file_get_contents("php://input"));

  $stmt = $task->read($data);
  $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
  header('Content-Type: application/json');
  echo json_encode($tasks);

?>