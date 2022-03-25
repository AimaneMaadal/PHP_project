<?php
//insert code here
if (!empty($_POST)) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    include_once(__DIR__ . "/classes/User.php");

    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password);
    if ($user->canLogin($email, $password)) {
        session_start();
        $_SESSION["user"] = $email;
        header("Location: index.php");
    } else {
        $error = true;
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
    <form action="" method="post">
        <label>Email address</label>
        <input type="email" name="email"><br>

        <label>Password</label>
        <input type="password" name="password"><br>
        </div>

        <button type="submit">Submit</button>
    </form>

    <a href="register.php">Don't have an account yet?</a>


</body>

</html>