<?php

// Variabelen globaal
$errors2 = array();
global $datatoegevoegd;


// Maak connectie
require_once 'Gegevens.php';
$dbh = new PDO ("sqlsrv:Server=$hostname; Database=$dbname;
     ConnectionPooling=0", "$username", "$pw");


// Zet POST variabelen
if (isset($_POST['reg_user'])) {
    $Naam = ($_POST['Naam']);
    $Achternaam = $_POST['Achternaam'];
    $Land = $_POST['Land'];
    $Geboortedatum = $_POST['Geboortedatum'];
    $Email = $_POST['Email'];
    $Rekeningnummer = $_POST['Rekeningnummer'];
    $Abonnement = $_POST['Abonnement'];
    $Gebruikersnaam = $_POST['Gebruikersnaam'];
    $Wachtwoord_1 = $_POST['Wachtwoord-1'];
    $Wachtwoord_2 = $_POST['Wachtwoord-2'];

    $Wachtwoord = password_hash($Wachtwoord_1, PASSWORD_DEFAULT);


// Push errors
  if (empty($Naam)) { array_push($errors2, "Naam ontbreekt"); }
  if (empty($Achternaam)) { array_push($errors2, "Achternaam ontbreekt"); }
  if (empty($Land)) { array_push($errors2, "Land ontbreekt"); }
  if (empty($Geboortedatum)) { array_push($errors2, "Geboortedatum ontbreekt"); }
  if (empty($Email)) { array_push($errors2, "E-mail ontbreekt"); }
  if (empty($Rekeningnummer)) { array_push($errors2, "Rekeningnummer ontbreekt"); }
  if (empty($Abonnement)) { array_push($errors2, "Abonnement ontbreekt"); }
  if (empty($Gebruikersnaam)) { array_push($errors2, "Gebruikersnaam ontbreekt"); }
  if (empty($Wachtwoord_1)) { array_push($errors2, "Wachtwoord 1 ontbreekt"); }
  if (empty($Wachtwoord_2)) { array_push($errors2, "Wachtwoord 2 ontbreekt"); }
  if ($Wachtwoord_1 != $Wachtwoord_2) { array_push($errors2, "De wachtwoorden komen niet overeen"); }


// Check of alles is ingevuld & laad de gegevens in
  if (count($errors2) == 0) {
    $query = "INSERT INTO Customers (Naam, Achternaam, Land, Geboortedatum, Email, Rekeningnummer, Abonnement, Gebruikersnaam, Wachtwoord)
              VALUES (?, ?, ?, ?, ?, >, ?, ?, ?)";
    $results = $dbh->prepare($query);
    $results -> execute(array($Naam, $Achternaam, $Land,
                              $Geboortedatum, $Email, $Rekeningnummer,
                              $Abonnement, $Gebruikersnaam, $Wachtwoord_1));

// Data toegevoegd, ga door naar inloggen
    if ($results) {
      header("Location: index.php");
      $datatoegevoegd = true;
    }

// Data niet toegevoegd
    else {
      array_push($errors2, "Data niet toegevoegd");
    }
  }

}


?>
