<?php

require_once("bootstrap.php");
$id = $_GET['id'];
Post::deletePostByPostId($userId, $id);
header("Location: profilepage.php");
