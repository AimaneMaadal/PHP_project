<?php

include_once("bootstrap.php");

session_start();
$sessionId = $_SESSION['user'];
$userData = User::getUserFromEmail($sessionId);

$profilePicture = $userData['profilepicture'];
$firstname = $userData['firstname'];
$lastname = $userData['lastname'];
$fullname = $userData['firstname'] . " " . $userData['lastname'];
$education = $userData['education'];
$bio = $userData['bio'];
$id = $userData['id'];

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
                <p class="profileCard_education"><?php echo $education; ?></p>
                <p class="profileCard_description"><?php echo $bio; ?></p>
                <p class="profileCard_description">Followers : <?php echo User::countFollowers($id); ?></p>
                
            </div>
        </div>

    
        <div class="profilePosts">
            <h1>Werk van <span><?php echo $firstname ?></span></h1>

           
            <?php foreach ($allPosts as $p) : ?>
                <div class="project" style=" background-image: url('<?php echo $p["imgpath"] ?>');">
                    <ul class="projectSettings">
                        <li><a href="deletepost.php?id=<?php echo $p['id'] ?>"><i class="fa-solid fa-trash-can"></i> Delete</a></li>
                        <li><a href="updateproject.php?id=<?php echo $p['id'] ?>"><i class="fa-solid fa-pen-to-square"></i> Update</a></li>
                        <?php
                            if ($p['showcase'] == 1) {
                                echo '<li><input type="button" data-id="'.$p['id'].'" class="addFollow" id="addShow" name="showcase"  value="add showcase"></li>';
                            }
                            else {
                                echo '<li><input type="button" data-id="'.$p['id'].'" class="removeFollow" id="addShow" name="showcase" value="remove showcase"/></li>';
                            }
                        ?>
                    </ul>    
                </div>   
            <?php endforeach; ?>
        </div>



</body>
<script>  
 $(document).on("click","#addShow",function(){
     if ($(this).hasClass("addFollow")) {
          $(this).removeClass("addFollow");
          $(this).addClass("removeFollow");
          $(this).val("remove showcase");
     }
     else{
          $(this).removeClass("addFollow");
          $(this).addClass("addFollow");
          $(this).val("add showcase");
     }
     $.ajax({  
        url:"ajax/add_showcase.php",  
        method:"POST",  
        data:{
        showcase: 2, 
        postid: $(this).attr("data-id") 
        },  
        success:function(data){ 
            $('#showcase-success').html(data); 
            $('#showcase-success').addClass("show");
        } 
     }); 
      
 }); 
 </script>  

</html>