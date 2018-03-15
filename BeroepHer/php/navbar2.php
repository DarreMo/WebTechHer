<nav class = "nav" id="navigation">
    <div class = "brand">
        <a href = "index.php" style="text-decoration:none"><img src= "../img/logo.svg" alter="WeebFlix Logo" class = "logo">
            <font size= "30px"> WeebFlix </font>
        </a>
    </div>

 <?php
 include("functions.php");
 session_start();
 check_login();
 ?>
    <div class = "menu">
        <a href= "movie-list.php" class="menuu">Movies</a>
        <a href="About-Us.php" class="menuu">About Us</a>
        <a href="login.php" class="menuu">Login</a>
    </div>
</nav>
