<?php
session_start();
if(!isset($_SESSION['TaskID'])){
    header('Location: ../index.php');
    exit;
}
?>
