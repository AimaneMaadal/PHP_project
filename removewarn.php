<?php

include_once("classes/Db.php");

$id = $_GET['id'];

$conn = Db::getInstance();
$sql = "UPDATE users SET warning = 'NULL' WHERE email = '$id'";
$result = $conn->query($sql);

header('Location: index.php');


?>
