<?php

include_once("bootstrap.php");

require 'includes/uploadToCloud.php';
require 'vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
} else {
    $user = new User();
    $sessionId = $_SESSION['user'];
    $userData = User::getUserFromEmail($sessionId);
}

$config = parse_ini_file("classes/config.ini");
Configuration::instance([
    'cloud' => [
        'cloud_name' => $config['cloud_name'],
        'api_key' => $config['api_key'],
        'api_secret' => $config['api_secret']
    ],
    'url' => [
        'secure' => true
    ]
]);

$post = new Post();
$postId = $_GET['id'];
$postData = Post::getPost($postId);

if (!empty($_POST['updateProjectImage'])) {
    try {
        if (isset($_FILES['projectImage'])) {
            $file = $_FILES['projectImage'];

            echo uploadFileCloud($file);
    
            $imagePath = uploadFileCloud($file);
            
            $post->setImgPath($imagePath);
            $post->updateProjectPicture($imagePath, $postId);
    
    
            $uploadedImage = "images/".$_FILES['projectImage']['name'];
            if (file_exists($uploadedImage)) {
               unlink($uploadedImage);
            }

            header('location: updateproject.php?id='.$postId);
        }

    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}

if (!empty($_POST['update'])) {
    try {
        $post->setTitle($_POST['updateTitle']);
        $post->setDescription($_POST['updateDescription']);
        $post->setTags($_POST['updateTags']);
        $post->setPostId($postData['id']);

        $post->updatePost();

        header('location: updateproject.php?id='.$postId);

    } catch (Throwable $error) {
        $error = $error->getMessage();
    }
}


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

    <?php if (!empty($error)) {
        echo $error;
    } ?>


    <h1 class="editHeader"><span>Update project</span></h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="editProfilePic">
            <img id="editProject" class="projectPicture" src="<?php echo $postData['imgpath']; ?>" alt="Project picture">
            <label>Wijzig Project foto<input type="file" id="userImage" name="projectImage" value=""></label><br>
            <label>Upload image<input type="submit"id="userImageButton" name="updateProjectImage" value="Update project picture"></label>
        </div>
    </form>


<form action="" method="post" class="profile_info">
    <table class="profileTable">
        <tbody>
            <tr>
                <td> 
                    <label>Title</label><br>
                    <input class="updateProfileInput" type="text" name="updateTitle" value="<?php echo htmlspecialchars($postData['title']); ?>">
                </td>
                <td>
                    <label>Description</label><br>
                    <input class="updateProfileInput" type="text" name="updateDescription" value="<?php echo htmlspecialchars($postData['description']); ?>">
                </td>
                <td>
                    <label>Tags</label><br>
                    <input class="updateProfileInput" type="text" name="updateTags" value="<?php echo htmlspecialchars($postData['tags']); ?>">
                </td>
            </tr>
            
                <td colspan="2">
                    <input class="updateProfileButton"type="submit" name="update" value="Update post">
                </td>
        </tbody>
    </table>
       
</form>



</body>

</html>