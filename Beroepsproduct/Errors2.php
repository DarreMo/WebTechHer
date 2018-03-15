<?php
if (count($errors2) > 0){
  ?>
  <div class="error">
    <p>
  <?php
  foreach ($errors2 as $error2) {
    echo $error2 . "<br>";
  }
  ?>
    </p>
  </div>
  <?php
}
?>
