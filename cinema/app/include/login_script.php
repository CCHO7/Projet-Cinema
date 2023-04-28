<?php

if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    require_once 'bdd_script.php';
    require_once 'functions.php';

    if(emptyInputLogin($email, $mdp) !== false){
        header("location: ../login.php?error=emptyinput");
    }

    loginUser($conn, $email, $mdp);
}

?>