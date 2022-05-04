<?php
require_once("bootstrap.php");
if(isset($_POST["search-email"])) {
    $value = trim($_POST["search-email"]);
    $Records = new User();
    echo $Records->searchData($value);  
}