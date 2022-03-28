<?php 
    $sessionId = $_SESSION['user'];
    $user = User::getUserFromEmail($sessionId);
    echo $user['firstname'];
?>

<nav class="navbar">
    <a class="navbar__btn" href="index.php">Home</a>
</nav>