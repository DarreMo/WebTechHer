<nav class = "nav" id="navigation">
    <div class = "brand">
        <a href = "index.php" style="text-decoration:none"><img src= "../img/logo.svg" alter="WeebFlix Logo" class = "logo"> WeebFlix</a>
    </div>

    <form method="post" action="">
      <input type="hidden" name="datum" value="<?php echo "Het is vandaag " . date("Y/m/d") . "<br>"; ?>">
      <input type="hidden" name="tijd" value="<?php echo "Ingelogd sinds " . date("h:i") . " uur.<br>"; ?>">
      <input type="text" name="bid" placeholder="naam"/>
      <input type="submit" name="mybtn" value="Submit"/>
    </form>

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
