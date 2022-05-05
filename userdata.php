<?php

include_once("bootstrap.php");

session_start();

$id = $_GET['id'];
$userData = user::getUserFromId($id);

$user = user::getUserFromEmail($_SESSION['user']);


if($user['id'] == $id){
    header("Location: profilepage.php");
}

$profilePicture = $userData['profilepicture'];
$firstname = $userData['firstname'];
$lastname = $userData['lastname'];
$fullname = $userData['firstname'] . " " . $userData['lastname'];
$education = $userData['education'];
$bio = $userData['bio'];

// var_dump(user::getUserFromId($id));

$allPosts = Post::getPostsByUserId($id);

$currentUser = user::getUserFromEmail($_SESSION['user'])['id'];


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
    <div id='showcase-success'></div>
    <div class="profileContainer">
        <div class="profileCard">
            <div class="profileCard_head">
                <img class="profilePicture profilePicture--small" src="<?php echo $profilePicture ?>" alt="">
            </div>

            <div class="profileCard_content">
                <p class="profileCard_username"><?php echo $fullname; ?></p>
                <?php
                
                // echo $user['id']." ". $id;
                if(user::checkFollow($user['id'], $id) == 2){
                    echo '<input type="button" data-id="'.$id.'" class="add" id="followButton" name="follow"  value="folllow"/ >';
                    echo '<input type="button" data-id="'.$id.'" class="remove" id="unfollowButton" name="follow"  value="unfolllow" style="display:none"/>';
                }
                else{
                    echo '<input type="button" data-id="'.$id.'" class="add" id="followButton" name="follow"  value="folllow" style="display:none"/>';
                    echo '<input type="button" data-id="'.$id.'" class="remove" id="unfollowButton" name="follow"  value="unfolllow" />';            
                }
                ?>
                <p class="profileCard_education"><?php echo $education; ?></p>
                <p class="profileCard_description"><?php echo $bio; ?></p>
            </div>
        </div>

        <div class="profilePosts">
            <h1>Werk van <span><?php echo $firstname ?></span></h1>

           
            <?php foreach ($allPosts as $p) : ?>
                <div class="project" style=" background-image: url('<?php echo $p["imgpath"] ?>');">
                    <a href="#"><i class="fa-solid fa-bookmark"></i></i></a>
                </div>    
            <?php endforeach; ?>
        </div>


</body>
<script>  
 $(document).on("click","#followButton",function(){
    $("#unfollowButton").show();
    $("#followButton").hide();
    $.ajax({  
        url:"ajax/add_following.php",  
        method:"POST",  
        data:{
            followed: $(this).attr("data-id"),
            follower: <?php echo $currentUser?> 
          
        },  
        success:function(data){ 
            $('#showcase-success').html(data); 
            $('#showcase-success').addClass("show");
        } 
    }); 
 }); 
 $(document).on("click","#unfollowButton",function(){
    $("#followButton").show();
    $("#unfollowButton").hide();
     $.ajax({  
        url:"ajax/remove_following.php",  
        method:"POST",  
        data:{
            followed: $(this).attr("data-id"),
            follower: <?php echo $currentUser?> 
        },  
        success:function(data){ 
            $('#showcase-success').html(data); 
            $('#showcase-success').addClass("show");
        } 
     }); 
 }); 
 </script>  
</html>