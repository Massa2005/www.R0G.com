<?php
session_start();
require_once('DBHandler.php');
$coderid = $_SESSION['coderID'];
$code = $_POST['code'];
    try {
        $query = "INSERT INTO sandbox (id, code) VALUES (:id, :code) 
          ON DUPLICATE KEY UPDATE code = VALUES(code);";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':id', $coderid);
        $sth->bindParam(':code', $code);
        $sth->execute();
        $response = array('status' => 'success');
    } catch (PDOException $e) {
        echo json_encode(array('status' => 'error', 'message' => 'Errore nella connessione al database: ' . $e->getMessage()));
    }
    echo json_encode($response);
?>
