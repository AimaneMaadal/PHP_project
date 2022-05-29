<?php

include_once("bootstrap.php");

session_start();

$postId = $_GET['id'];

$postData = Post::getPost($postId);
$postPicture = $postData['imgpath'];
$postTitle = $postData['title'];
$postDescription = $postData['description'];
// echo "<pre>";
// var_dump($postData);
// echo "</pre>";

$posterUserData = Post::getUserByPostId($postId);
$profilePicturePoster = $posterUserData['profilepicture'];
$firstNamePoster = $posterUserData['firstname'];
$lastNamePoster = $posterUserData['lastname'];
$fullnamePoster = $firstNamePoster . " " . $lastNamePoster;
$postTags = json_decode($postData['tags']);
// echo "<pre>";
// var_dump($posterUserData);
// echo "</pre>";

if (isset($_SESSION['unique_id'])) {
    $userDataCommenter = User::getUserFromEmail($_SESSION['user']);
    $profilePictureCommenter = $userDataCommenter['profilepicture'];
    $firstNameCommenter = $userDataCommenter['firstname'];
    $lastNameCommenter = $userDataCommenter['lastname'];
    $fullnameCommenter = $firstNameCommenter . " " . $lastNameCommenter;
}

// echo "<pre>";
// var_dump($userDataCommenter);
// echo "</pre>";


// COMMENTS MET AJAX
//controleer of er een update wordt verzonden
if (!empty($_POST)) {
    try {
        $comment = new Comment();
        $comment->setText($_POST['comment']);
        $comment->saveComment();
    } catch (\Throwable $th) {
        //throw $th;
    }
}

//altijd alle laatste activiteiten ophalen
$comments = Comment::getAll();


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

    <div class="postContainer">
        <div class="posterContainer">
            <div class="posterImgContainer"><img class="posterImg" src="<?php echo $profilePicturePoster ?>" alt=""></div>
            <div class="posterName">
                <h1><?php echo $fullnamePoster ?></h1>
            </div>
        </div>

        <div class="postImgContainer">
            <img class="postImg" src="<?php echo $postPicture ?>" alt="">
        </div>

        <?php 

        foreach ($postTags as $tag) {
            echo "<div class='tagContainer'>";
            echo "<h3 class='tag'>".$tag."</h3>";
            echo "</div>";
        }

        ?>


        <?php if(isset($_SESSION['user'])) : ?>
        <form method="post" action="">
            <h1>Comments</h1>
            <div class="commentSection">
                <textarea name="comment" class="comment" cols="100" rows="10" placeholder="Share your opinion here..."></textarea>
                <input class="btn" type="submit" value="Add comment" />

                <ul id="listupdates">
                    <?php
                    foreach ($comments as $c) {
                        echo "<li>" . $c->getText() . "</li>";
                    }

                    ?>
                </ul>
            </div>
        </form>
        <?php endif; ?>
    </div>

    <script src="js/app.js"></script>
</body>

</html>