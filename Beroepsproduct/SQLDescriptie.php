<?php
function get_database_connection () {
  $hostname = "(local)";
  $dbname   = "WeebFlix";
  $username = "sa";
  $password = "Levensbloem";

  $dbh = new PDO ("sqlsrv:Server=$hostname;
  Database=$dbname;
  ConnectionPooling=0",
  "$username", "$password");

  return $dbh;
}

$dbh = get_database_connection();
$title = $_GET['defilm'];

$sql = 'SELECT * FROM movie WHERE title = ?';
$stmt = $dbh->prepare($sql);
$stmt->execute(array($title));
$row = $stmt->fetch();

echo'<div class="poster">';
echo("<img height = 300 src=\"/beroepsproduct%20webtech/img/poster/$row[poster_link]\">");
echo"<br>Titel: <strong>" . ($row['title'] . "</strong>");
echo"<br>Duur: " . ($row['duration']);
echo"<br>Beschrijving: " . ($row['description']);
echo"<br>Jaar: " . ($row['publication_year']);
echo"<br><a href='".($row['trailer_url'])."'>Trailer</a>";
echo'</div>';
echo"<br>";
?>
