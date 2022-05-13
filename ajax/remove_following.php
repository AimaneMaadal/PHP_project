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

    //create sql that deletes the row from the table
    $sql = "DELETE FROM followers WHERE id_follower = '$follower' AND id_followed = '$followed'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $statement2 = $connect->prepare("SELECT * FROM users WHERE id = :id");
    $statement2->bindValue(':id', $followed);
    $statement2->execute();
    $result = $statement2->fetch();
    echo "You have unfollowed ".json_encode($result["firstname"]);

  
}
else{
    echo "something went wrong";
}
   
  
?>  