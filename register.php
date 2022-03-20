<?php

 if(!empty($_POST)){
    try{
      include_once(__DIR__ . "/classes/User.php");

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password2 = $_POST['password2'];
      
      $user = new User();

      $user->setEmail($email);
      $user->setPassword($password);
      $user->setFirstname($firstname);
      $user->setLastname($lastname);

      if($user->canRegister($password,$password2)){
        echo "SESSION HAS STARTED";
        session_start();
        $_SESSION['user'] = $user->getEmail();
        $user->register();

      }
  }
  catch(Throwable $error) {
    // if any errors are thrown in the class, they can be caught here
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

  <form action="" method="post">

    <label>First name</label>
    <input type="text" name="firstname"><br>

    <label>Last name</label>
    <input type="text" name="lastname"><br>

    <label>Email address</label>
    <input type="email" name="email"><br>

    <label>Password</label>
    <input type="password" name="password"><br>

    <label>Confirm password</label>
    <input type="password" name="password2"><br>


    <button type="submit">Submit</button>
  </form>

  <a href="register.php">Don't have an account yet?</a><br>

  <?php if (isset($error)) {
    echo $error;
  }?>

</body>

</html>