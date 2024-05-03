<?php
session_start();
require_once('DBHandler.php');
$nickname = $_SESSION['nickname'];
$profileImage = $_POST['profileImage'];
$profileImageDecoded = html_entity_decode($profileImage);
$imageInfo = @getimagesize($profileImageDecoded);
if ($imageInfo === false) {
    $response = "l'immagine " . $profileImage . " non esiste";
} else {
    $imageType = $imageInfo[2];
    if($imageType == IMAGETYPE_GIF && $_SESSION['vip'] == 0){
        $response = "puoi usare GIF solo se sei VIP";
    } else if ($imageType != IMAGETYPE_JPEG && $imageType != IMAGETYPE_PNG) {
        $response = "immagine non valida (usa solo link per .jpg/.png)";
    } else {
        try {
            $query = "UPDATE coder SET picture = :profileImage WHERE nickname=:nickname;";
            $sth = DBHandler::getPDO()->prepare($query);
            $sth->bindParam(':nickname', $nickname);
            $sth->bindParam(':profileImage', $profileImageDecoded);
            $sth->execute();
            $_SESSION['profileImage'] = $profileImageDecoded;
            $response = array('status' => 'success');
        } catch (PDOException $e) {
            echo json_encode(array('status' => 'error', 'message' => 'Errore nella connessione al database: ' . $e->getMessage()));
        }
    }
}
    echo json_encode($response);
?>
