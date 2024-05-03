<?php
session_start();
if(!isset($_SESSION['TaskID'])){
    header('Location: ../index.php');
    exit;
}
require_once('DBHandler.php');
$taskid = $_SESSION['TaskID'];
    try {
        $query = "SELECT descrizione, nome FROM task WHERE taskid=:taskid;";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':taskid', $taskid);
        $sth->execute();
        $task = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($task);
        } catch(PDOException $e) {
            echo "Errore durante l'esecuzione della query: " . $e->getMessage();
        }
?>
