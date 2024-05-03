<?php
session_start();
require_once('DBHandler.php');
$taskid = $_POST['taskid'];
    try {
        $query = "SELECT d.input, d.output, d.lineid, t.descrizione, t.nome FROM data AS d INNER JOIN task AS t ON d.taskid = t.taskid WHERE t.taskid=:taskid;";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':taskid', $taskid);
        $sth->execute();
        $task = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($task);
        } catch(PDOException $e) {
            echo "Errore durante l'esecuzione della query: " . $e->getMessage();
        }
?>
