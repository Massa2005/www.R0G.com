<?php
session_start();
if(!isset($_SESSION['coderID'])){
    header('Location: ../index.php');
    exit;
}
?>
