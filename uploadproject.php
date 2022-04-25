
<?php

include_once("bootstrap.php");

require 'vendor/autoload.php';
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

$config = parse_ini_file("config/config.ini");




Configuration::instance([
    'cloud' => [
      'cloud_name' => $config['cloud_name'], 
      'api_key' => $config['api_key'], 
      'api_secret' => $config['api_secret']],
    'url' => [
      'secure' => true]]);

session_start();

if (!isset($_SESSION['user'])) {
    header('location: login.php');
} else {
    $user = new User();
    $sessionId = $_SESSION['user'];
    $userData = User::getUserFromEmail($sessionId);
}


if (!empty($_POST)) {
    try {
        $imageName = $_FILES['userImage']['name'];
        $fileType  = $_FILES['userImage']['type'];
        $fileSize  = $_FILES['userImage']['size'];
        $fileTmpName = $_FILES['userImage']['tmp_name'];
        $fileError = $_FILES['userImage']['error'];

        $title = $_POST['title'];
        $description = $_POST['description'];

        $fileData = explode('/', $fileType);
        $fileExtension = $fileData[count($fileData) - 1];

        if (!empty($imageName)) {
            if ($fileExtension == 'jpg' || $fileExtension == 'jpeg' || $fileExtension == 'png') {
                //check if file is correct type
                //check file size
                if ($fileSize < 5000000) {

                    $fileNewName = "images/" . basename($imageName);
                    $uploaded = move_uploaded_file($fileTmpName, $fileNewName);

                    if ($uploaded) {


                        $post = new Post();

                        $post->setTitle($title);
                        $post->setDescription($description);

                        
                        $data = (new UploadApi())->upload($fileNewName);
                        unlink($fileNewName);
                        echo $data['secure_url']."<br>".$title."<br>".$description;

                        $imgPath = $data['secure_url'];


                        $post->setimgPath($imgPath);
                        $post->setUserId($_SESSION['user']);

                        $post->uploadPost();

                    }
                }
                else {
                    throw new Exception("File is to big max 50mb");
                }
            }
            else {
                throw new Exception("File must be a jpg or png");
            }
        }
        else {
            throw new Exception("Image is required");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
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


    <?php if (!empty($error)) {echo $error; } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label>Create Post</label><br>
            <img id="imagePreview" src="#" alt="your image" /><br>
            <input type="file" id="userImage" name="userImage" value="" onchange="preview()"><br>
            <input type="text" placeholder="Title" name="title" value=""><br>
            <input type="text" placeholder="Description" name="description" value=""><br>
        </div>
        <input type="submit">
    </form>


<script>
userImage.onchange = evt => {
    const [file] = userImage.files
  if (file) {
    imagePreview.src = URL.createObjectURL(file);
  }
}
</script>
  

</body>
</html>
