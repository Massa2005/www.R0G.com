<?php
session_start();
require_once('DBHandler.php');
$taskid = $_POST['taskid'];
    try {
        $query = "CALL DeleteTaskAndData(:taskid);";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':taskid', $taskid);
        $sth->execute();
        $response = array('status' => 'success');
        echo json_encode($response);
        } catch(PDOException $e) {
            echo "Errore durante l'esecuzione della query: " . $e->getMessage();
        }
?>
