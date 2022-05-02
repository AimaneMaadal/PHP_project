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

$config = parse_ini_file("config/config.ini");
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


if (!empty($_POST['updateImage'])) {
    try {
        if (isset($_FILES['userImage'])) {
            $file = $_FILES['userImage'];

            echo uploadFileCloud($file);
    
            $imagePath = uploadFileCloud($file);
            
            $user->setProfilePicture($imagePath);
            $user->updateProfilePicture($imagePath, $sessionId);
    
    
            $uploadedImage = "images/".$_FILES['userImage']['name'];
            if (file_exists($uploadedImage)) {
               unlink($uploadedImage);
            }
        }

    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}

if (!empty($_POST['update'])) {
    try {
        $user->setFirstName($_POST['updateFirstName']);
        $user->setLastname($_POST['updateLastName']);
        $user->setEmail($_POST['updateEmail']);
        $user->setBackupEmail($_POST['updateBackupEmail']);
        $user->setBio($_POST['updateBio']);
        $user->setEducation($_POST['updateEducation']);
        $user->setLinkedIn($_POST['updateLinkedIn']);
        $user->setBehance($_POST['updateBehance']);
        $user->setDribble($_POST['updateDribble']);
        $user->setUserId($userData['id']);


        $user->updateUser();


        $userData = User::getUserFromEmail($sessionId);

        // var_dump($userData);
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


    <h1 class="editHeader"><span>Mijn profiel</span> &nbsp; &nbsp; Mijn gegevens</h1>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="editProfilePic">
            <img id="profilePic" class="profilePicture" src="<?php echo $userData['profilepicture']; ?>" alt="Profile picture">
            <label>Wijzig profiel foto<input type="file" id="userImage" name="userImage" value=""></label><br>
            <label>Upload image<input type="submit"id="userImageButton" name="updateImage" value="Update profile picture"></label>
        </div>
    </form>



<form action="" method="post" class="profile_info">
    <table class="profileTable">
        <tbody>
            <tr>
                <td> 
                    <label>First Name</label><br>
                    <input class="updateProfileInput" type="text" name="updateFirstName" value="<?php echo htmlspecialchars($userData['firstname']); ?>">
                </td>
                    <td><label>Last Name</label><br>
                    <input class="updateProfileInput" type="text" name="updateLastName" value="<?php echo htmlspecialchars($userData['lastname']); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email address</label><br>
                    <input class="updateProfileInput" type="email" name="updateEmail" value="<?php echo htmlspecialchars($userData['email']); ?>" readonly>
                </td>
                <td>
                    <label>Backup email address</label><br>
                    <input class="updateProfileInput" type="email" name="updateBackupEmail" value="<?php echo htmlspecialchars($userData['backupemail']); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Education</label><br>
                    <input class="updateProfileInput" type="text" name="updateEducation" value="<?php echo htmlspecialchars($userData['education']); ?>">
                </td>
                <td>
                    <label>LinkedIn</label><br>
                    <input class="updateProfileInput" type="text" name="updateLinkedIn" value="<?php echo htmlspecialchars($userData['linkedin']); ?>">
                </td>
            </tr>
            <tr>
                <td rowspan="2">
                    <label>Bio</label><br>
                    <input class="updateProfileInput" type="text" style="height: 130px;" name="updateBio" value="<?php echo htmlspecialchars($userData['bio']); ?>">
                </td>
                <td>
                    <label>Behance</label><br>
                    <input class="updateProfileInput" type="text" name="updateBehance" value="<?php echo htmlspecialchars($userData['behance']); ?>">
            </td>
            </tr>
            <tr>
                <td>
                    <label>Dribble</label><br>
                    <input class="updateProfileInput" type="text" name="updateDribble" value="<?php echo htmlspecialchars($userData['dribble']); ?>">
            </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="updateProfileButton"type="submit" name="update" value="Update gegevens">
                </td>
        </tbody>
    </table>
       
</form>

    <a href="changepassword.php">Change current password</a>
    <a href="delete.php">Delete profile</a>



<script>
userImage.onchange = evt => {
  const [file] = userImage.files
  if (file) {
    profilePic.src = URL.createObjectURL(file)
  }
}
</script>

</body>

</html>