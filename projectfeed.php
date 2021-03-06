<?php
include_once("bootstrap.php");

session_start();
if (isset($_SESSION['user'])) {
    $user = new User();
    $sessionId = $_SESSION['user'];
    $userData = User::getUserFromEmail($sessionId);
}

if (isset($_GET['search'])) {
    $post = new Post;
    $allPosts = $post->getAllPostsLimitFiltered($_GET['search']);
    /*$tags = $post->getAllPostsByUserTags($_GET['search']);*/
} else {
    $post = new Post;
    $allPosts = $post->getAllPostsLimit();
}


//var_dump($allPosts);


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

    <?php if (!isset($_GET['search'])) : ?>
        <div class="pages">
            <?php for ($pages = 1; $pages <= $total_pages; $pages++) : ?>
                <a href='<?php echo "?page=$pages"; ?>' class="links"><?php echo $pages; ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>


</body>

</html>