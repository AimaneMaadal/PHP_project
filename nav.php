<nav>

    <div class="nav_left">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>     
    </ul>
    </div>

    <div class="logo">
        <img src="images/logo.svg" style="width: 80%;"/>
    </div>
  

    <?php
    if (isset($_SESSION['user'])) {
        $sessionId = $_SESSION['user'];
        $user = User::getUserFromEmail($sessionId);
        //echo "Welkom ".$user["email"];
        echo "<div class='nav_right'><a class='nav_btn' href='logout.php'>Log out</a><a class='nav_btn' href='usersettings.php'>Edit profile</a></div>";
    } else {
        echo "<div class='nav_right'><a class='nav_btn' href='login.php'>Log in</a> ";
        echo "<a class='nav_btn' href='register.php'>Registreren</a></div>";
    }

    ?>

</nav>