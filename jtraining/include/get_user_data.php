<?php
session_start();

if(isset($_SESSION['nickname'])){
    $data = array(
        'nickname' => $_SESSION['nickname'],
        'profileImage' => $_SESSION['profileImage'],
        'bannerImage' => $_SESSION['bannerImage'],
        'prefix' => $_SESSION['prefix'],
        'effect' => $_SESSION['effect'],
        'status' => "logged"
    );
} else {
    $data = array(
        'nickname' => "",
        'profileImage' => "",
        'bannerImage' => "",
        'status' => "notLogged"
    );
}

header('Content-Type: application/json');
echo json_encode($data);
?>