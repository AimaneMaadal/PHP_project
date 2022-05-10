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
// echo "<pre>";
// var_dump($posterUserData);
// echo "</pre>";

$userDataCommenter = User::getUserFromEmail($_SESSION['user']);
$profilePictureCommenter = $userDataCommenter['profilepicture'];
$firstNameCommenter = $userDataCommenter['firstname'];
$lastNameCommenter = $userDataCommenter['lastname'];
$fullnameCommenter = $firstNameCommenter . " " . $lastNameCommenter;
// echo "<pre>";
// var_dump($userDataCommenter);
// echo "</pre>";


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
    </div>




</body>

</html>