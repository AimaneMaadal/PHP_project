<?php

require_once("bootstrap.php");
$id = $_GET['id'];
Post::deletePostByPostId($id);
header('Location: ' . $_SERVER['HTTP_REFERER']);