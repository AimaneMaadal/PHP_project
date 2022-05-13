<?php

include "../classes/DB.php";
include "../classes/Follow.php";
include "../classes/User.php";

if (isset($_POST["followed"])) {

    $followed = $_POST["followed"];
    $follower = user::getUserFromEmail($_SESSION['user'])['id'];

    $follow = new Follow();
    $follow->setFollowed($followed);
    $follow->setFollower($follower);
    $follow->addFollow();
    
    
    $user = User::getUserFromId($followed);

    echo "You have followed <b>".json_encode($user["firstname"])."</b>";
}
else{
    echo "something went wrong";
}
   
  
?>  