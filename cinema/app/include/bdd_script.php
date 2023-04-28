<?php

$serverName = "db";
$dbUserName = "docker_user";
$dbPassword = "password";
$dbName = "cinema";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if(!$conn){
    die("Connection à la Base de données impossible: " . mysqli_connect_error());
}

?>