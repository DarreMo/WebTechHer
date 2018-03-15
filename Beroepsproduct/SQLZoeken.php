<?php

// Searching Movie's
$output;
function search_movie($dbh, $input){

    $output = "";
    $input = preg_replace('#[^0-9a-z]#i','',$input);

    $query = $dbh -> prepare("SELECT top 50 * FROM movie WHERE [title] LIKE '%$input%'");
    $query -> execute();

    while ($row = $query -> fetch()){
        $mname = $row['title'];
        $poster = $row['poster_link'];
        $desc = $row['description'];
        $year = $row['publication_year'];
        $dur = $row['duration'];

        $output .=
        '<div class = "poster">
        <img src = img/poster/'.$poster.' </img> </div>
        <div><strong>' .$mname. '</strong></div>
        <div> <strong>(' .$year. ')</strong></div>
        <form action="Description-page.php" class="Filmoptie">
              <input type="hidden" name="defilm" value="'. ($row['title']) .'">
              <input type="submit" name="mybtn" class="btn" value="Filmpagina"/>
        </form>
        </div>';
    }
    echo $output;
}
?>
