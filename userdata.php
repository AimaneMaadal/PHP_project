<?php

include_once("bootstrap.php");

session_start();

$id = $_GET['id'];
$userData = user::getUserFromId($id);

$profilePicture = $userData['profilepicture'];
$firstname = $userData['firstname'];
$lastname = $userData['lastname'];
$fullname = $userData['firstname'] . " " . $userData['lastname'];
$education = $userData['education'];
$bio = $userData['bio'];

// var_dump(user::getUserFromId($id));

$allPosts = Post::getPostsByUserId($id);

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
        <div class="profileCard">
            <div class="profileCard_head">
                <img class="profilePicture profilePicture--small" src="<?php echo $profilePicture ?>" alt="">
            </div>

            <div class="profileCard_content">
                <p class="profileCard_username"><?php echo $fullname; ?></p>
                <p class="profileCard_education"><?php echo $education; ?></p>
                <p class="profileCard_description"><?php echo $bio; ?></p>
            </div>
        </div>

        <div class="profilePosts">
            <h1>Werk van <?php echo $firstname ?></h1>

            <?php foreach ($allPosts as $p) : ?>
                <a href="#" class="project"><img src="<?php echo $p["imgpath"] ?>" alt=""></a>
            <?php endforeach; ?>
        </div>



</body>

</html>