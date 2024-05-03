<?php
session_start();
require_once('DBHandler.php');
    try {
        $query = "SELECT picture, nickname, points, prefix, effect, coderid FROM coder ORDER BY points DESC LIMIT 10;";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->execute();
        $users = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
        } catch(PDOException $e) {
            echo "Errore durante l'esecuzione della query: " . $e->getMessage();
        }
?>