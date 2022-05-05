<?php
 //insert.php
 $host = "localhost";
 $username = "root";
 $password = "usbw";
 $database = "imdribble";
 $teller = 0;
 try {
     $connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if (isset($_POST["showcase"])) {
         $teller++;
         $showcase = $_POST["showcase"];
         $postId = $_POST["postid"];
         $query = "UPDATE `posts` SET `showcase` = $showcase WHERE `posts`.`id` = $postId;";
         $statement = $connect->prepare($query);
         $statement->execute();

         $statement2 = $connect->prepare("SELECT * FROM posts WHERE showcase = 2");
         $statement2->execute();
         $result2 = $statement2->fetchAll();
         echo "project <b>".($result2[0]["title"])."</b> ";
         
         $count = $statement->rowCount();
         if ($count > 0) {
            echo "has been added to showcase";
         } else {
             $query = "UPDATE `posts` SET `showcase` = 1 WHERE `posts`.`id` = $postId;";
             $statement = $connect->prepare($query);
             $statement->execute();

             $query2 = "SELECT * FROM 'posts' WHERE `posts`.`id` = $postId;";
             $statement2 = $connect->prepare($query);
             $statement2->execute();
             $result = $statement2->fetchAll();
             echo "has been removed from showcase";
         }
     }
 } catch (PDOException $error) {
     echo $error->getMessage();
 }
 ?>  