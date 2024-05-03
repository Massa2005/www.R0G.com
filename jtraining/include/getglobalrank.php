<?php
require_once('DBHandler.php');

session_start();
function getUserPosition($userID) {
    $query = "SELECT coderid, points FROM coder ORDER BY points DESC";
    
    try {
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->execute();
        $users = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        $position = 0;
        foreach ($users as $index => $user) {
            if ($user['coderid'] == $userID) {
                $position = $index + 1;
                break;
            }
        }
        
        return $position;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

$userID = $_SESSION['id'];
echo GetUserPosition($userID);
unset($_SESSION['id']);
?>