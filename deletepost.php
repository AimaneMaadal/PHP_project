<?php

require_once("bootstrap.php");
$id = $_GET['id'];
$userId = $_GET['userId'];
Post::deletePostByPostId($userId, $id);
header("location:javascript://history.go(-1)");