<?php

//vérification que ce script est éxécuté par le formulaire d'inscription
if(isset($_POST["submit"])){

    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $remdp = htmlspecialchars($_POST["remdp"]);

    //on vérifie que le formulaire a été rempli correctement
    require_once 'functions.php';
    require_once 'bdd_script.php';

    //si on trouve une erreur, on renvoie l'utilisateur au formulaire
    if(emptyInput($nom, $prenom, $email, $mdp, $remdp) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(pwdDontMatch($mdp, $remdp) !== false) {
        header("location: ../signup.php?error=pwdmatch");
        exit();
    }

    if(emailTaken($conn, $email) !== false){
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    //si tout est correct, on crée un utilisateur dans la BD
    createUser($conn, $nom, $prenom, $email, $mdp);
}

else{
    header("location: ../signup.php");
}

?>