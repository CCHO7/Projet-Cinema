<?php
/*
* Le script utilise une variable pour savoir ou rediriger: dest
* dest = le nom du fichier ou on veut aller, ex: index.php#films
*/

if(!isset($_GET["dest"])){
    header("location: ../index.php");
}

$header = "location: ../" . $_GET["dest"];

header($header);