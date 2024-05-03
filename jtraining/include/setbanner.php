<?php
session_start();
require_once('DBHandler.php');
$nickname = $_SESSION['nickname'];
$bannerImage = $_POST['bannerImage'];
$bannerImageDecoded = html_entity_decode($bannerImage);
$imageInfo = @getimagesize($bannerImageDecoded);
if ($imageInfo === false) {
    $response = "l'immagine " . $bannerImageDecoded . " non esiste";
} else {
    $imageType = $imageInfo[2];
    if($imageType == IMAGETYPE_GIF && $_SESSION['vip'] == 0){
        $response = "puoi usare GIF solo se sei VIP";
    } else if ($imageType != IMAGETYPE_JPEG && $imageType != IMAGETYPE_PNG && $imageType != IMAGETYPE_WEBP) {
        $response = "immagine non valida (usa solo link per .jpg/.png)";
    } else {
        try {
            $query = "UPDATE coder SET banner = :bannerImage WHERE nickname=:nickname;";
            $sth = DBHandler::getPDO()->prepare($query);
            $sth->bindParam(':nickname', $nickname);
            $sth->bindParam(':bannerImage', $bannerImageDecoded);
            $sth->execute();
            $_SESSION['bannerImage'] = $bannerImageDecoded;
            $response = array('status' => 'success');
        } catch (PDOException $e) {
            echo json_encode(array('status' => 'error', 'message' => 'Errore nella connessione al database: ' . $e->getMessage()));
        }
    }
}
    echo json_encode($response);
?>
