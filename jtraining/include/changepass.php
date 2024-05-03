<?php
require_once('DBHandler.php');
session_start();

$nickname = $_SESSION['nickname'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];

$query = "SELECT password FROM coder WHERE nickname=:nickname;";
$sth = DBHandler::getPDO()->prepare($query);
$sth->bindParam(':nickname', $nickname);
$sth->execute();
$userData = $sth->fetch(PDO::FETCH_ASSOC);

if (!$userData) {
    echo json_encode('Utente non trovato.');
    exit;
}

if (!password_verify($oldPassword, $userData['password'])) {
    echo json_encode('La password vecchia non corrisponde.');
} else {
    if (strlen($newPassword) < 8) {
        echo json_encode('La password deve essere di almeno 8 caratteri.');
    } else {
        try {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE coder SET password = :newPassword WHERE nickname=:nickname;";
            $updateStm = DBHandler::getPDO()->prepare($updateQuery);
            $updateStm->bindParam(':nickname', $nickname);
            $updateStm->bindParam(':newPassword', $hashedNewPassword);
            $updateStm->execute();
            $response = array('status' => 'success');
        } catch (PDOException $e) {
            $response = array('status' => 'error', 'message' => 'Errore nella connessione al database: ' . $e->getMessage());
        }
        echo json_encode($response);
    }
}
?>
