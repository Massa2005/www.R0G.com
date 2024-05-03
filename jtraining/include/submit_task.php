<?php
session_start();
require_once('DBHandler.php');
$taskid = $_POST['taskid'];
    try {
        $query = "UPDATE task SET submit=1 WHERE taskid=:taskid;";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':taskid', $taskid);
        $sth->execute();
        $response = array('status' => 'success');
    } catch (PDOException $e) {
        echo json_encode(array('status' => 'error', 'message' => 'Errore nella connessione al database: ' . $e->getMessage()));
    }
    echo json_encode($response);
?>
