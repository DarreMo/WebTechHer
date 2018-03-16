<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/index.css">
<link rel="icon" type="image/svg" href="../img/logo.jpg">
<title>WeebFlix</title>
</head>

<body>

<!-- FlexBox 1 -->
<?php include("navbar2.php"); ?>

<!-- FlexBox 3 -->
<div class = "content">

<div class = "forms">
<form action="movie-list.php" method="get">
<input type="text" name="search" placeholder="search for movies"/>
<button class="btn">Search</button>
</form>
</div></div>
<div class= "results">
<?php

$allmovies = "*";
$dbh = get_database_connection();

if(isset($_GET['search'])){
    search_movie($dbh, $_GET['search']);
} else {
    search_movie($dbh, $allmovies);
}
?>
</div>

</div>
</body>
