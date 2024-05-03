<?php
session_start();
require_once('DBHandler.php');
$coderid = $_SESSION['coderID'];
$descrizione = $_POST['descrizione'];
$nome = $_POST['nome'];
$inputList = $_POST['inputList'];
$outputList = $_POST['outputList'];
$nlines = $_POST['nlines'];
$taskid= $_POST['taskid'];
    try {
        $query = "CALL UpdateTaskAndData(:ownerid, :descrizione, :nome, :inputList, :outputList, :nlines, :currentTaskID);";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':ownerid', $coderid);
        $sth->bindParam(':descrizione', $descrizione);
        $sth->bindParam(':nome', $nome);
        $sth->bindParam(':inputList', $inputList);
        $sth->bindParam(':outputList', $outputList);
        $sth->bindParam(':nlines', $nlines);
        $sth->bindParam(':currentTaskID', $taskid);
        $sth->execute();
        $response = array('status' => 'success');
    } catch (PDOException $e) {
        echo json_encode(array('status' => 'error', 'message' => 'Errore nella connessione al database: ' . $e->getMessage()));
    }
    echo json_encode($response);
?>
