<?php

require_once 'Gegevens.php';


  $dbh = new PDO ("sqlsrv:Server=$hostname;
  Database=$dbname;
  ConnectionPooling=0",
  "$username", "$pw");


for ($i=0; $i <3 ; $i++) {
  $nummer = (rand(1,30));

  $sql = "SELECT * FROM movie WHERE movie_id = ?";
  $stmt = $dbh->prepare($sql);
  $stmt->execute(array($nummer));
  $row = $stmt->fetch();

  echo'<div class="poster">';
  echo("<img height = 300 src=\"/beroepsproduct%20webtech/img/poster/$row[poster_link]\">");
  echo"<br><strong>" . ($row['title'] . "");
  echo"<br>(" . ($row['publication_year']) . ")</strong>";
  echo '<form action="Description-page.php" class="Filmoptie">
        <input type="hidden" name="defilm" value="'. ($row['title']) .'">
        <input type="submit" name="mybtn" class="btn" value="Filmpagina"/>
        </form>';
  echo'</div>';
  echo"<br>";
}

?>
