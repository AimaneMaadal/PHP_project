<?php

include_once("bootstrap.php");

session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
} else {
    $user = new User();
    $sessionId = $_SESSION['user'];
    $userData = User::getUserFromEmail($sessionId);
}


if (!empty($_POST)) {
    try {
        $title = $_POST['title'];
        $description = $_POST['desc'];
        $imgPath = "a";

        $post = new Post();

        $post->setTitle($title);
        $post->setDescription($description);
        $post->setimgPath($imgPath);
        $post->setUserId($_SESSION['user']);

        var_dump($post->getUserId());

        $post->uploadPost();
    

   
    } catch (Throwable $error) {
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

    <header>
        <?php include('nav.php'); ?>
    </header>

    <?php if (!empty($error)) {echo $error; } ?>
    <form action="" method="post">
    <br><br>
      <label>Title</label>
      <input type="text" name="title"><br>

      <label>description</label>
      <input type="text" name="desc" ><br>
      


      <button type="submit">Submit</button>
    </form>
</body>

</html>