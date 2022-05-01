<?php

include_once("bootstrap.php");

$id = $_GET['id'];
$userData = user::getUserFromId($id);

$email = $userData['email'];

// var_dump(user::getUserFromId($id));


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1><?php echo $email; ?></h1>
    
</body>
</html>