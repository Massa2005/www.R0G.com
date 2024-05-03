<?php
require_once('DBHandler.php');
session_start();
function isNicknameTaken($username) {
    $query = "SELECT COUNT(*) as count FROM coder WHERE nickname = :username";
    try {
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':username', $username);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

$username = $_POST['username'];
$password = $_POST['password'];
$profileImage = "https://cdn-icons-png.flaticon.com/512/3829/3829543.png";
$bannerImage = "https://image-assets.aus-2.volcanic.cloud/api/v1/assets/images/32f72c33406981b9063241ad4b5be308?t=1684131760&format=webp";
$image_type_check = @exif_imagetype($profileImage);

if (strlen($password) < 8) {
    echo json_encode('la password deve essere di almeno 8 caratteri');
} else if (strlen($username) < 4) {
    echo json_encode('il nickname deve essere di almeno 4 caratteri');
} else if (!(strpos($http_response_header[0], "200") && ($image_type_check == IMAGETYPE_JPEG || $image_type_check == IMAGETYPE_PNG))) {
    echo "immagine non valida (usa solo link per .jpg/.png)";
} else if (isNicknameTaken($username)) {
    echo json_encode('Nickname già assegnato');
} else {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO coder(nickname, password, points, picture, tierid, banner, vip, effect, prefix) VALUES(:nickname, :password, 0, :profileImage, 1, :bannerImage, 0, :bianco, :nulla);";
        $sth = DBHandler::getPDO()->prepare($query);
        $sth->bindParam(':nickname', $username);
        $sth->bindParam(':password', $hashedPassword);
        $sth->bindParam(':profileImage', $profileImage);
        $sth->bindParam(':bannerImage', $bannerImage);
        $sth->bindParam(':bianco', "bianco");
        $sth->bindParam(':nulla', "");
        $sth->execute();

        if ($sth->rowCount() > 0) {
            $lastId = DBHandler::getPDO()->lastInsertId();
            $_SESSION['coderID'] = $lastId;
            $_SESSION['nickname'] = $username;
            $_SESSION['profileImage'] = $profileImage;
            $_SESSION['bannerImage'] = $bannerImage;
            $_SESSION['effect'] = "bianco";
            $_SESSION['prefix'] = "";
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error');
        }
        //header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
