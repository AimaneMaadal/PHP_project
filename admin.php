<?php


include_once("classes/Db.php");

$conn = Db::getInstance();

if (isset($_GET['ban'])) {
    $id = $_GET['ban'];
    echo "You have banned <b>" . $id . "</b>";
    $sql = "UPDATE users SET warning = '2' WHERE id = '$id'";
    $result = $conn->query($sql);
}
if (isset($_GET['unban'])) {
    $id = $_GET['unban'];
    echo "You have been unbanned <b>" . $id . "</b>";
    $sql = "UPDATE users SET warning = '0' WHERE id = '$id'";
    $result = $conn->query($sql);
}
if (isset($_GET['warn'])) {
    $id = $_GET['warn'];
    echo "You have sent a warning to <b>" . $id . "</b>";
    $sql = "UPDATE users SET warning = '1' WHERE id = '$id'";
    $result = $conn->query($sql);
}
header('Location: usersettings.php');
