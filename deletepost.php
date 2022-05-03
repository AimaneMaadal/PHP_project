<?php

require_once("bootstrap.php");
$id = $_GET['id'];
Post::deletePostByPostId($id);
header("Location: profilepage.php");
