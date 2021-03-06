<?php

function get_database_connection () {
    $hostname = "(local)";
    $dbname   = "WebTech";
    $username = "sa";
    $password = "1234";
    
    $dbh = new PDO ("sqlsrv:Server=$hostname;
    Database=$dbname;
    ConnectionPooling=0",
    "$username", "$password");
    
    return $dbh;
}


function check_login(){
    
    If (isset($_POST['mybtn'])) {
        if ($_POST['bid'] != "") {
            if ($_POST['bid'] != "0"){
                $_SESSION['naam'] = $_POST['bid'];
                $_SESSION['datum'] = $_POST['datum'];
                $_SESSION['tijd'] = $_POST['tijd'];
            }
        }
    }
    if (!empty ($_SESSION['naam'])) {
        $gebruiker = $_SESSION['naam'];
        echo ($gebruiker);
    }
    
    ?>
    <br>
    <?php
    
    if (!empty ($_SESSION['datum'])) {
        $datum = $_SESSION['datum'];
        echo ($datum);
    }
    
    if (!empty ($_SESSION['tijd'])){
        $tijd = $_SESSION['tijd'];
        echo ($tijd);
    }
    
    if (!empty($_SESSION['naam'])){
        ?>
        <a href='logout.php'>Click here to log out</a>
        <?php
    }
    
    else {
        echo 'You are not logged in!';
    }
}

$output;
function search_movie($dbh, $input){
    
    $query;
    
    if ($input == "*"){
        $query = "SELECT * FROM movie";
    } else {
        $query = "SELECT top 50 * FROM movie WHERE [title] LIKE '%$input%'" ;
    }
    
    $output = "";
    $input = preg_replace('#[^0-9a-z]#i','',$input);
    
    $sqlexe = $dbh -> prepare($query);
    $sqlexe -> execute();
    
    while ($row = $sqlexe -> fetch()){
        $mname = $row['title'];
        $poster = $row['poster_link'];
        $desc = $row['description'];
        $year = $row['publication_year'];
        $dur = $row['duration'];
        
        $output .=  
        '<div class = "result">
        <img class="poster-result" src = ../img/poster/'.$poster.' </img>
        <div class = "result-text">
        <div><strong>' .$mname. '</strong></div>
        <div> <strong>Publication Year:</strong>   ' .$year. '</div>
        <br>
        <form action="Description-page.php" class="Filmoptie">
        <input type="hidden" name="defilm" value='. ($row['title']) .'>
        <input type="submit" name="mybtn" class="btn" value="Filmpagina"/>
        </form>
        </div></div>';
    }
    echo $output;
}

function movie_desc_page($dbh, $title) {
    
    $output= ""; 

    $sql = "SELECT * FROM movie WHERE [title] LIKE '%$title%' ";
    $stmt = $dbh->prepare($sql);
    $stmt-> execute();
    $row = $stmt->fetch();

    $mname = $row['title'];
    $poster = $row['poster_link'];
    $desc = $row['description'];
    $year = $row['publication_year'];
    $dur = $row['duration'];
    $url = $row['trailer_url'];

    $output =
    '
    <div class="movie-info">
    <h1> '.$mname. ' </h1>
    <div class="poster-desc">
    <img class="poster-desc" src= ../img/poster/'.$poster.'></div>
    <h2>Duur:</h2> '.$dur.'<br>
    <h2>Jaar:</h2> '.$year.' </div>
    
    <div class="movie-content">
    <div class="movie-desc">
    <h3>Beschrijving:</h3>
    <p>  '.$desc.' </p></div>
    <br>
    <div class="trailer">
    <iframe width="640" height="480" frameBorder="0" src= '.$url.' >
    </iframe>
    </div></div>';
    
    echo $output;
}

?>  