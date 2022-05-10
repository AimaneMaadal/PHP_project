<?php

 $host = "127.0.0.1:3307";
 $username = "root";
 $password = "root";
 $database = "imdribble";

 
$connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["reported"])) {

    $reporter = $_POST["reporter"];
    $reported = $_POST["reported"];

    $sql = "INSERT  INTO reportusers (id_reporter, id_reported) VALUES ('$reporter', '$reported')";
    $statement = $connect->prepare($sql);
    $statement->execute();    
    
    $statement2 = $connect->prepare("SELECT * FROM users WHERE id = :id");
    $statement2->bindValue(':id', $reported);
    $statement2->execute();
    $result = $statement2->fetch();
    echo "Reported ".$result["firstname"];
}
else{
    echo "something went wrong";
}
   
  
?>  