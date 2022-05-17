<?php 
    require_once("../bootstrap.php");

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $result = User::checkLiveEmail($email);

        echo $result;
    } 