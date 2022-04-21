<?php

    include_once("bootstrap.php");

    session_start();
    if (isset($_SESSION['user'])) {
        $sessionId = $_SESSION['user'];
        User::deleteUser($sessionId);
        var_dump($sessionId);
    }
    session_destroy();
    header("Location: register.php");
?>