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
$tietel = 'Berserk';

$vraag = 'SELECT * FROM movie WHERE title= ":tietel"';
$movie = $dbh->prepare($vraag);

$result = $movie->execute(array(":tietel" => $tietel));
$user = $movie->fetch(PDO::FETCH_ASSOC);

echo $result['title'];

?>
