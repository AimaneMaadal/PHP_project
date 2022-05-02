<?php

include_once("bootstrap.php");

session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brandish</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <?php include('nav.php'); ?>
    </header>
    <h1 class="landingTitle">Share your work, get feedback and inspire others!</h1>
    
    <form action="projectfeed.php" method="get">
        <input type="text" name="search" placeholder="Search">
        <input type="submit" value="Search">
    </form>

</body>

</html>