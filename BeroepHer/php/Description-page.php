<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/index.css">
<link rel="icon" type="image/svg" href="../img/logo.jpg">
<title>WeebFlix</title>
</head>

<body>

<?php include("navbar2.php"); ?>

<div class = "content">
<?php

$dbh = get_database_connection();
$title = $_GET['defilm'];

if(isset($_GET['defilm'])){ 
  movie_desc_page($dbh, $title);
}

?>

</div>

</body>
</html>
