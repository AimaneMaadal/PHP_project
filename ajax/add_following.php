<?php

 $host = "localhost";
 $username = "root";
 $password = "usbw";
 $database = "imdribble";
 $teller = 0;
 
$connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["followed"])) {

    $followed = $_POST["followed"];
    $follower = $_POST["follower"];

    $sql = "INSERT  INTO followers (id_follower, id_followed) VALUES ('$follower', '$followed')";
    $statement = $connect->prepare($sql);
    $statement->execute();    
    
    $statement2 = $connect->prepare("SELECT * FROM users WHERE id = :id");
    $statement2->bindValue(':id', $followed);
    $statement2->execute();
    $result = $statement2->fetch();
    echo "You have followed ".$result["firstname"];
}
else{
    echo "something went wrong";
}
   
  
?>  