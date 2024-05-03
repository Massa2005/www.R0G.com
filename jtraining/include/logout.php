<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    $response = array('status' => 'success');
    echo json_encode($response);
?>