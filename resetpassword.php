<?php

include_once("bootstrap.php");


if (!empty($_POST)) {
    $email = $_POST["email"];

    $user = User::getUserFromEmail($email);

    if ($user) {
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
    
        $token = md5($email."salty".$expDate);
    
        User::passwordResetToken($token,$expDate,$email);

        header("Location: mail.php?token=$token");
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
        <label>Email address</label>
        <input type="email" name="email"><br>


        <button type="submit">Submit</button>
    </form>



</body>

</html>