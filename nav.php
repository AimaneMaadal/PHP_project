<?php 
    if (isset($_SESSION['user'])) {
        $sessionId = $_SESSION['user'];
        $user = User::getUserFromEmail($sessionId);
        echo "Welkom ".$user["firstname"];
    }
    

?>

<nav class="navbar">
    <a class="navbar__btn" href="index.php">Home</a>
    <a class="navbar__btn" href="logout.php">logout</a>
</nav>