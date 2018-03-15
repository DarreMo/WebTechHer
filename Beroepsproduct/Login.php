<?php include('SQLLogin.php'); ?>

<!-- Loginform-->
  <form method="post" action="index.php">
    <div class="header">
    	<h2>Login</h2>
    </div>
	   <input type="hidden" name="datum" value="<?php echo "Het is vandaag " . date("Y/m/d") . "<br>"; ?>">
     <input type="hidden" name="tijd" value="<?php echo "Ingelogd sinds " . date("H:i") . " uur.<br>"; ?>">
	   <?php include('Errors.php'); ?>
  	 <div class="Invoer-veld">
  		  <label>Gebruikersnaam</label>
  		  <input type="text" name="Gebruikersnaam" >
  	 </div>
  	 <div class="Invoer-veld">
  	  	<label>Wachtwoord</label>
  	  	<input type="password" name="Wachtwoord">
  	 </div>
  	 <div class="Invoer-veld">
  	  	<button type="submit" class="btn" name="login_user">Login</button>
  	 </div>
  	 <p>
  	 	Nog geen lid? <a href="Registreren.php">Registreer hier</a>
  	 </p>
  </form>
