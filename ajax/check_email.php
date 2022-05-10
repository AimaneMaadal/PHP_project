<?php
require_once '../classes/Db.php';
if (isset($_POST['username'])) {
    $conn = Db::getInstance();
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $query = mysqli_query($conn, "select name,email,username from users where LCASE(username)='" . strtolower($username) . "'");
    if ($query->num_rows > 0) {
        echo "ok";
    } else {
        echo "no";
    }
}
?>