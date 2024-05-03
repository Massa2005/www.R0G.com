<?php
session_start();
require_once('DBHandler.php');
$creatorid = $_SESSION['coderID'];

$query = "SELECT * FROM task WHERE creatorid = :creatorid";
    try {
    $sth = DBHandler::getPDO()->prepare($query);
    $sth->bindParam(':creatorid', $creatorid, PDO::PARAM_INT);
    $sth->execute();
    $tasks = $sth->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
        echo json_encode($tasks);
    } catch(PDOException $e) {
        echo "Errore durante l'esecuzione della query: " . $e->getMessage();
    }
?>