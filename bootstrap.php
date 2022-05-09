<?php
spl_autoload_register(function ($class) {
    require_once(__DIR__ . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . $class . ".php");
});
?>

<link rel="stylesheet" href="https://use.typekit.net/ppk1taf.css">
<script src="https://kit.fontawesome.com/6ec6696b28.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
