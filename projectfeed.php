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

    $post = new Post;
    $allPosts = $post->getAllPostsLimit();
    //var_dump($allPosts);
            

?><!DOCTYPE html>
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
        <?php foreach($allPosts as $p): ?>

        <div class="post">

            <div class="post_head">
                <img class="post_image" src="<?php echo $p['imgpath']; ?>" alt="">
            </div>

            <a href="userdata.php?id=<?php echo $p['userid']?>" class="post_userinfo">
                <img class="profilePicture_small" src="images/profile_pictures/<?php echo $post->getUserByPostId($p['id'])['profilepicture'] ?>" alt="">
                <p class="post_username"><?php echo $post->getUserByPostId($p['id'])['firstname'] . " " . $post->getUserByPostId($p['id'])['lastname']; ?></p>
            </a>

            <div class="post_content">
                <p><?php echo $p['title']; ?></p>
                <p><?php echo $p['description']; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="pages">
       <?php for ($pages=1; $pages <= $total_pages ; $pages++):?>
            <a href='<?php echo "?page=$pages"; ?>' class="links"><?php  echo $pages; ?></a>
        <?php endfor; ?> 
    </div>
    

</body>
</html>