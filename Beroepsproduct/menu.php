<!--De navigatiebalk-->
<nav class = "nav" id="navigation">
    <div class = "brand">
        <a href = "index.php" style="text-decoration:none"><img src= "../Beroepsproduct/img/logo.svg" alt="WeebFlix Logo" class = "logo">
            <font size= "30px"> WeebFlix </font>
        </a>
    </div>

  <?php

  session_start();

// Databse connectie
  require_once 'Gegevens.php';
  require_once 'SQLLogin.php';
  require_once 'SQLRegistreren.php';

  $dbh = new PDO ("sqlsrv:Server=$hostname; Database=$dbname;
                  ConnectionPooling=0", "$username", "$pw");



  if ($datatoegevoegd == true) {
        echo "Data toegevoegd!!!";
  }

// Zet session variabelen naar POST input
  if (isset($_POST['login_user']) &&  $bestaat == true) {
      if ($_POST['Gebruikersnaam'] != "") {
        if ($_POST['Gebruikersnaam'] != "0"){
          $_SESSION['Gebruikersnaam'] = $_POST['Gebruikersnaam'];
          $_SESSION['datum'] = $_POST['datum'];
          $_SESSION['tijd'] = $_POST['tijd'];
        }
      }
    }


// Echo ingelogde gebruiker
      if (!empty ($_SESSION['Gebruikersnaam'])) {
        $gebruiker = $_SESSION['Gebruikersnaam'];
        echo $gebruiker;
      }
      ?>
      <br>
      <?php

// Echo inlogdatum
      if (!empty ($_SESSION['datum'])){
        $datum = $_SESSION['datum'];
        echo $datum;
      }

// Echo inlogtijd
      if (!empty ($_SESSION['tijd'])){
        $tijd = $_SESSION['tijd'];
        echo $tijd;
      }

//Uitlogknop
      if (!empty($_SESSION['Gebruikersnaam'])) {
        ?>
        <div class="Uitlogknop">
          <a href='logout.php' class="Uitlogknop">Klik hier om uit te loggen!</a>
        </div>
        <?php
      }



// Bericht wanneer niet ingelogd
  else {
    echo 'U bent niet ingelogd!';
  }

  ?>
<!-- Pagina-links-->
    <div class = "menu">
        <a href= "movie-list.php" class="menu">Movies</a>
        <a href= "about-us.php" class="menu">About Us</a>
        <a href= "Gastenboek.php" class="menu">Gastenboek</a>
    </div>
</nav>
