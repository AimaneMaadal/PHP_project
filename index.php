<?php
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");

    session_start();
    if(!isset($_SESSION['user'])) {
        header('location: login.php');
    } else{
        $user = new User();
        $sessionId = $_SESSION['user'];
        $userData = User::getUserFromEmail($sessionId);
    }

    

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include('nav.php');?>
    </header>
</body>

</html>