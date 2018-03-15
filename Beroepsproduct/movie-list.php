<?php
require

("SQLZoeken.php");

require_once 'Gegevens.php';

$dbh = new PDO ("sqlsrv:Server=$hostname; Database=$dbname;
     ConnectionPooling=0", "$username", "$pw");


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="index.css">
<link rel="icon" type="image/svg" href="../img/logo.jpg">
<title>WeebFlix</title>
</head>

<body>

<!-- FlexBox 1 -->
<?php include("menu.php"); ?>

<!-- FlexBox 3 -->
<div class = "content">

<div class = "forms">
<form action="movie-list.php" method="get">
<input type="text" name="search" placeholder="Zoek naar films"/>
<button class="btn">Zoek</button>

</form>

<?php
if(isset($_GET['search'])){
    search_movie($dbh, $_GET['search']);
    }
?>

</div>
</body>
