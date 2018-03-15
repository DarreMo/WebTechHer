<?php include('menu.php');?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" type="image/svg" href="../img/logo.jpg">
    <title>Gastenboek</title>
</head>
<body>

<form action="Gastenboek.php" method="post">
  <label>Wat is uw naam?<label><br>
  <input type="text" name="naam"><br>
  <input type="hidden" value="<?php echo date('F Y H:i');?> " name="date">
  <label>Wat is uw naam?<label><br>
    <textarea name="commentaar"></textarea>
  <input type="submit" name="deknop" value="Voeg comment toe!">
</form>

<?php
// Maak connectie
require_once 'Gegevens.php';
$dbh = new PDO ("sqlsrv:Server=$hostname; Database=$dbname;
     ConnectionPooling=0", "$username", "$pw");

// Zet POST variabelen
if (isset($_POST['deknop'])) {
  if ($_POST['naam']) {
  $name = $_POST['naam'];
  $comments = $_POST['commentaar'];
  $date = $_POST['date'];

// Check of comment te lang is
  $comment_length = strlen($comments);
  if ($comment_length > 100) {
    echo "Comment te lang";
  }

// Stop waarden in de tabel
  else {
    $sql = "INSERT INTO comments VALUES (?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($comments, $name, $date));
  }
}
}
?>
<div>

  <?php
// Haal alle waardes uit tabel comments
$sql = "SELECT * FROM comments order by [date] DESC";
$rows = $dbh->prepare($sql);
$rows->execute();

foreach ($rows as $row) {
  echo $row['naam'] . "<br>";
  echo $row['comment']. "<br>";
  echo $row['date']. "<br>";
}

?>

</div>






</body>
