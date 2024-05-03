<?php
session_start();
require_once('DBHandler.php'); // Include il file di connessione al database
$id = $_SESSION['coderID'];

$query = "SELECT code FROM sandbox WHERE id = :id;";

try {
    $stmt = DBHandler::getPDO()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch (PDOException $e) {
    echo "Errore durante il recupero del testo: " . $e->getMessage();
}
?>
