<?php
include_once("bootstrap.php");
//code check email
if(!empty($_POST["email"])) {
$conn = Db::getInstance();
$statement = $conn->prepare("SELECT count(*) FROM users WHERE email='" . $_POST["email"] . "'");
$statement->execute();
$row = mysqli_fetch_row($statement);
$email_count = $row[0];
if($email_count>0) echo "<span style='color:red'> Email Already Exist .</span>";
else echo "<span style='color:green'> Email Available.</span>";
}
// End code check email
?>