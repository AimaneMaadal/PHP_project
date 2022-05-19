<?php

include_once("bootstrap.php");

session_start();

$post = new Post;
$allPosts = $post->getAllPostsLimit();

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
    <h1 class="landingTitle">Share your work, get feedback and inspire others!</h1>
    
    <form action="projectfeed.php" method="get">
        <input class="searchbar" type="text" name="search" placeholder="Search">
    </form>
    <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        <option value="">Chronological</option>
        <option value="https://google.com">Following</option>
    </select>
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

</html>