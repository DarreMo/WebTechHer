<?php

// Variabelen globaal
$errors = array();
global $bestaat;

// Maak connectie
require_once 'Gegevens.php';
$dbh = new PDO ("sqlsrv:Server=$hostname; Database=$dbname;
     ConnectionPooling=0", "$username", "$pw");


// Zet POST variabelen
if (isset($_POST['login_user'])) {
  $Gebruikersnaam = ($_POST['Gebruikersnaam']);
  $Wachtwoord = ($_POST['Wachtwoord']);

// Push errors
  if (empty($Gebruikersnaam)) {
  	array_push($errors, "Gebruikersnaam ontbreekt");
  }
  if (empty($Wachtwoord)) {
  	array_push($errors, "Wachtwoord ontbreekt");
  }

// Check of alles is ingevuld & zoek naar account
  if (count($errors) == 0) {
		$query = "SELECT COUNT(*) FROM Customers
              WHERE Gebruikersnaam= ?
              AND Wachtwoord= ? ";
		$results = $dbh -> prepare($query);
		$results -> execute(array($Gebruikersnaam, $Wachtwoord));

// Login succes, ga naar movie-list
	  if ($results -> fetchColumn() > 0) {
		     header("Location: movie-list.php");
         $bestaat = true;
       }

// login gefaald, laat berich zien
    else {
      array_push($errors, "Gebruikersnaam en wachtwoord komen niet overeen");
    }
  }

}

?>
