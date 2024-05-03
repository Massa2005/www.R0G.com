<?php
session_start();
require_once('DBHandler.php');
$username = $_POST['username'];
$password = $_POST['password'];

try {
    $query = "SELECT * FROM coder WHERE nickname=:username";
    $sth = DBHandler::getPDO()->prepare($query);
    $sth->bindParam(':username', $username);
    $sth->execute();
    if ($sth->rowCount() > 0) {
        $rows = $sth->fetchAll();
        $hashedPassword = $rows[0]['password'];
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['nickname'] = $rows[0]['nickname'];
            $_SESSION['profileImage'] = $rows[0]['picture'];
            $_SESSION['bannerImage'] = $rows[0]['banner'];
            $_SESSION['coderID'] = $rows[0]['coderid'];
            $_SESSION['effect'] = $rows[0]['effect'];
            $_SESSION['prefix'] = $rows[0]['prefix'];
            $_SESSION['vip'] = $rows[0]['vip'];
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error');
        }
    } else {
        $response = array('status' => 'error');
    }

    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(array('status' => 'error', 'message' => 'Errore nella connessione al database: ' . $e->getMessage()));
}
?>
