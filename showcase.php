<?php

include_once("bootstrap.php");

session_start();

$id = $_GET['id'];
$userData = user::getUserFromId($id);


$firstname = $userData['firstname'];

// var_dump(user::getUserFromId($id));

$allPosts = Post::getPostsByUserIdShowcased($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Minds</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ppk1taf.css">
</head>

<body>

    <header>
        <?php include('nav.php'); ?>
    </header>

    <div class="profileContainer">
        <div class="profilePosts">
            <h1>Showcase <span><?php echo $firstname ?></span></h1>

           
            <?php foreach ($allPosts as $p) : ?>
                <div class="project" style=" background-image: url('<?php echo $p["imgpath"] ?>');">
                
                </div>    
            <?php endforeach; ?>
        </div>



</body>

</html>