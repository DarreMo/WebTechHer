<?php include('SQLRegistreren.php') ?>
<?php include("menu.php"); ?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="index.css">
<link rel="icon" type="image/svg" href="../img/logo.jpg">
<title>WeebFlix</title>
</head>
<body>

<div class = "content">
        <div class = "package lowprice">
            <p> Don't need an fancy package? </p>
        </div>

        <div class = "package bestbuy">
            <p> Have a bit more to spent for better features?</p>
        </div>

        <div class = "package richguy">
            <p> You're rich and want to look down on peasants</p>
        </div>


  <div class="header">
  	<h2>Registreren</h2>
  </div>
<?php include('Errors2.php'); ?>
  <form method="POST" action="Registreren.php">
		<div class="Invoer-veld">
  	  <label>Naam</label>
  	  <input type="text" name="Naam">
  	</div>

		<div class="Invoer-veld">
  	  <label>Achternaam</label>
  	  <input type="text" name="Achternaam">
  	</div>

		<div class="Invoer-veld">
		    <select name="Land">
		        <option value="Nederland">Nederland</option>
		        <option value="USA">USA</option>
		        <option value="Duitsland">Duitsland</option>
		        <option value="Frankrijk">Frankrijk</option>
		        <option value="België">België</option>
		        <option value="Anders">Anders</option>
	      </select>
  	</div>
		<div class="Invoer-veld">
  	  <label>Geboortedatum</label>
  	  <input type="date" name="Geboortedatum">
  	</div>

		<div class="Invoer-veld">
  	  <label>E-mail</label>
  	  <input type="email" name="Email">
  	</div>

		<div class="Invoer-veld">
  	  <label>Rekeningnummer</label>
  	  <input type="text" name="Rekeningnummer">
  	</div>

		<div class="Invoer-veld">
  	  <label>Abonnement</label>
        <select name="Abonnement">
          <option value="Basic">Basic ($5,99)</option>
          <option value="Weeaboo">Weeaboo ($8,99)</option>
          <option value="Otaku" selected="selected">Otaku ($14,99)</option>
        </select>
  	</div>

  	<div class="Invoer-veld">
  	  <label>Gebruikersnaam</label>
  	  <input type="text" name="Gebruikersnaam">
  	</div>

  	<div class="Invoer-veld">
  	  <label>Wachtwoord</label>
  	  <input type="password" name="Wachtwoord-1">
  	</div>

  	<div class="Invoer-veld">
  	  <label>Wachtwoord bevestigen</label>
  	  <input type="password" name="Wachtwoord-2">
  	</div>

  	<div class="Invoer-veld">
  	  <button type="submit" class="btn" name="reg_user">Registreer</button>
  	</div>
  	<p>
  		Heeft u al een account? <a href="index.php">Log in</a>
  	</p>
	</form>
</div>
</body>
</html>
