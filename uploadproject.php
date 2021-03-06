<?php

include_once("bootstrap.php");

require 'vendor/autoload.php';
require 'includes/uploadToCloud.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;


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

session_start();
$sessionId = $_SESSION['user'];


if (!isset($sessionId)) {
    header('Location: register.php');
}


if (!empty($_POST)) {
    try {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $tags = $_POST['tags'];

        $tags = json_encode(array_filter($tags));

        $imgPath = uploadFileCloud($_FILES['projectImage']);

        if (isset($imgPath)) {
            $post = new Post();
            $post->setTitle($title);
            $post->setDescription($description);
            $post->setTags($tags);



            $link = uploadFileCloud($_FILES['projectImage']);
            $post->setImgPath($link);



            var_dump($link);

            $post->setImgPath(uploadFileCloud($_FILES['projectImage']));
            $post->setTimePosted(date("Y-m-d H:i:s"));

            $userData = User::getUserFromEmail($sessionId);

        

            $post->setUserId($userData['id']);

            $post->uploadPost();

            $postData = Post::getLastPostByUserId($userData['id']);
            $uploadedImage = "images/" . $_FILES['projectImage']['name'];
            if (file_exists($uploadedImage)) {
                unlink($uploadedImage);
            }

            //redirect to posted project
            header('Location: project.php?id=' . $postData['id']);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <header>
        <?php include('nav.php'); ?>
    </header>
    <?php if (!empty($error)) {
        echo $error;
    } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="uploadProjectForm">
            <h1>Upload project</h1><br>
            <div class="uploadzone">
                Upload a file by draging your image, or click to select one:
                <input type="file" name="projectImage" class="uploadzoneInput">
            </div>
            <div class="inputFields">
                <input type="text" placeholder="Title" name="title" value="" class="inputField1"><br>
                <input type="text" placeholder="Description" name="description" value="" class="inputField2">

                <br>
                <h2>tags</h2>
                <div class="field_wrapper">
                    <div class="tagField">
                        <input type="text" name="tags[]" class="tagsInput" value="" />
                        <a href="javascript:void(0);" class="remove_button" style="display: none;">-</a>
                    </div>
                </div>
                <br><a href="javascript:void(0);" class="add_button" title="Add field">Add tag +</a>
                <input type="submit" class="postButton" value="Upload project">
            </div>







        </div>
    </form>


    <script>
        $(document).ready(function() {
            var maxField = 5;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper');
            var fieldHTML = '<div class="tagField"><input type="text" name="tags[]" class="tagsInput" value="" /> <a href="javascript:void(0);" class="remove_button" style="display: none;">-</a></div>';
            var x = 1;



            $(addButton).click(function() {
                if (x < maxField) {
                    var input = $(".field_wrapper div:nth-child(" + x + ") input").val();
                    if (input != "") {
                        $(".field_wrapper div:nth-child(" + x + ") input").prop("readonly", true);
                        $(".field_wrapper div:nth-child(" + x + ") input").val("#" + input);
                        $(".field_wrapper div:nth-child(" + x + ") a").css("display", "inline");
                        x++;
                        $(wrapper).append(fieldHTML);
                    }

                }
            });

            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        });

        document.querySelectorAll(".uploadzoneInput").forEach((inputElement) => {
            const dropZoneElement = inputElement.closest(".uploadzone");
            dropZoneElement.addEventListener("click", (e) => {
                inputElement.click();
            });
            inputElement.addEventListener("change", (e) => {
                if (inputElement.files.length) {
                    updateThumbnail(dropZoneElement, inputElement.files[0]);
                }
            });
            dropZoneElement.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZoneElement.classList.add("uploadzoneHover");
            });
            ["dragleave", "dragend"].forEach((type) => {
                dropZoneElement.addEventListener(type, (e) => {
                    dropZoneElement.classList.remove("uploadzoneHover");
                });
            });
            dropZoneElement.addEventListener("drop", (e) => {
                e.preventDefault();
                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;
                    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                }
                dropZoneElement.classList.remove("uploadzoneHover");
            });
        });

        function updateThumbnail(dropZoneElement, file) {
            let thumbnailElement = dropZoneElement.querySelector(".uploadzonePreview");
            // First time - remove the prompt
            if (dropZoneElement.querySelector(".uploadzone__prompt")) {
                dropZoneElement.querySelector(".uploadzone__prompt").remove();
            }
            // First time - there is no thumbnail element, so lets create it
            if (!thumbnailElement) {
                thumbnailElement = document.createElement("div");
                thumbnailElement.classList.add("uploadzonePreview");
                dropZoneElement.appendChild(thumbnailElement);
            }
            thumbnailElement.dataset.label = file.name;
            // Show thumbnail for image files
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                };
            } else {
                thumbnailElement.style.backgroundImage = null;
            }
        }

        function test() {
            alert();
            document.getElementByName("projectImage").value = null;
        }
    </script>






</body>

</html>