<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" type="image/svg" href="../img/logo.svg">
    <title>WeebFlix</title>
</head>
<body>
  <nav class="nav">
<?php
session_start();
session_destroy();
echo 'You have been logged out.';

?>
</nav>
<div class="menu">
  <a  class="logout" href="index.php">Go back</a>
</div>


</body>
