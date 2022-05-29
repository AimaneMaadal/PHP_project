<?php

include_once("bootstrap.php");
include_once("classes/User.php");

session_start();

$post = new Post;
$allPosts = $post->getAllPostsLimit();

if (isset($_SESSION['user'])) {
    $user = user::getUserFromEmail($_SESSION['user']);
    $warning = "";
    if ($user['warning'] == 1) {
        $warning = "Je account staat onder toezicht wegens het schenden van de community regels. Klik <a href='removewarn.php?id=" . $_SESSION['user'] . " '>hier</a> om akkord te gaan met de regels ";
    }
    if ($user['warning'] == 2) {
        $warning = "Je account is permanent gebanned wegens het schenden van de community regels";
    }
    if ($user['warning'] == 3) {
        $warning = "Je account is nu unbanned, welkom terug! ";
    }
}








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brandish</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <?php include('nav.php'); ?>
    </header>

    <?php
    if (!empty($warning)) {
        echo "<div id='showcase-warning'>" . $warning . "</div>";
    } ?>

    <h1 class="landingTitle">Share your work, get feedback and inspire others!</h1>

    <form action="projectfeed.php" method="get">
        <div class="searchfilter">
            <input class="searchbar" type="text" name="search" placeholder="Search">
        </div>
    </form>

    <div class="posts">
        <?php foreach ($allPosts as $p) : ?>

            <div class="post">

                <a href="project.php?id=<?php echo $p['id'] ?>" class="post_head">
                    <img class="post_image" src="<?php echo $p['imgpath']; ?>" alt="">
                </a>

                <?php if (isset($_SESSION['user'])) : ?>
                    <a href="userdata.php?id=<?php echo $p['userid'] ?>" class="post_userinfo">
                        <img class="profilePicture_small" src="<?php echo $post->getUserByPostId($p['id'])['profilepicture'] ?>" alt="">
                        <p class="post_username"><?php echo $post->getUserByPostId($p['id'])['firstname'] ?></p>
                    </a>
                    <div class="post_content">
                        <p><?php echo $p['title']; ?></p>
                        <p><?php echo $p['description']; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>



</script>

</html>