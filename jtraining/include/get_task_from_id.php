<?php
session_start();
require_once('DBHandler.php');
$taskid = $_POST['taskid'];

$query = "SELECT * FROM task WHERE taskid=:taskid";
    try {
    $sth = DBHandler::getPDO()->prepare($query);
    $sth->bindParam(':taskid', $taskid);
    $sth->execute();
    $task = $sth->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
        echo json_encode($task);
    } catch(PDOException $e) {
        echo "Errore durante l'esecuzione della query: " . $e->getMessage();
    }
?>