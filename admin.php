<?php


include_once("classes/Db.php");
include_once("classes/User.php");



session_start();

$conn = Db::getInstance();
$role = user::getUserFromEmail($_SESSION['user'])['role'];

if ($role == "admin") {
    if (isset($_GET['ban'])) {
        $id = $_GET['ban'];
        echo "You have banned <b>" . $id . "</b>";
        $sql = "UPDATE users SET warning = '2' WHERE id = '$id'";
        $result = $conn->query($sql);
    }
    if (isset($_GET['unban'])) {
        $id = $_GET['unban'];
        echo "You have been unbanned <b>" . $id . "</b>";
        $sql = "UPDATE users SET warning = '3' WHERE id = '$id'";
        $result = $conn->query($sql);
    }
    if (isset($_GET['warn'])) {
        $id = $_GET['warn'];
        echo "You have sent a warning to <b>" . $id . "</b>";
        $sql = "UPDATE users SET warning = '1' WHERE id = '$id'";
        $result = $conn->query($sql);
    }
    if (isset($_GET['postId'])) {
        $id = $_GET['postId'];
        echo "You have deleted post <b>" . $id . "</b>";
        $sql = "DELETE FROM posts WHERE id = '$id'";
        $result = $conn->query($sql); 
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
    echo "You are not an admin!!! please dont try this again I can track ur ip 👁";
}


