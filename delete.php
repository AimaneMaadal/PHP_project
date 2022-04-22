<?php

    include_once("bootstrap.php");

    session_start();
    if (isset($_SESSION['user'])) {
        try {
            $currentpassword = $_POST["currentpassword"];
            $sessionId = $_SESSION['user'];
            User::deleteUser($sessionId, $currentpassword);
            session_destroy();
            header("Location: register.php");
        }
        catch(Throwable $error) {
        $error = $error->getMessage();
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Minds</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<img id="logo_mini" src="images/logo_mini.svg">
<div id="form">
        <form action="" method="post">
        <br><br>
            <h1>Are you sure you want to delete your account?</h1>
            <label>Current password</label>
            <input type="password" name="currentpassword" class="inputfield"><br>

            <?php if (isset($error)) {
                echo "<div id='error'>".$error."</div>";
            }?>
            <button type="submit">Submit</button><br>
        </form>
    </div>