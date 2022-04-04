<?php

include_once("bootstrap.php");


$token = $_GET["token"];

//var_dump($token);



if (!empty($_POST)) {
    try {
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
    
        if ($password1 === $password2) {
            User::updatePassword($token,$password1);
            header("location: login.php");
        }
        else{
            throw new Exception("Passwords dont match each other");
        }
    }
    catch (Exception $e) {
        echo $e->getMessage();
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
    <?php if (!empty($error)) : ?>
        <div>Sorry, we couldn't log you in. Of course we need to hide this message by default.</div>
    <?php endif; ?>

    <form action="" method="post">
        <label>New password</label>
        <input type="password" name="password1"><br>

        <label>Confirm password</label>
        <input type="password" name="password2"><br>


        <button type="submit">Submit</button>
    </form>



</body>

</html>