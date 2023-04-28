<?php
session_start();
//include_once 'include/header.php';
$logedIn = true;
if (!isset($_SESSION["IdClient"])) {
    $logedIn = false;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style1.css">
    <script src="https://kit.fontawesome.com/927b94a7cf.js" crossorigin="anonymous"></script>
    <title>Cinéma</title>
</head>

<body>

    <script>
        //script pour la navbar qui devient opaque 
        let header = document.querySelector('header');

        window.addEventListener('scroll', () => {
            header.classList.toggle('shadow', window.scrollY > 0);
        });
    </script>

    <?php

    //on arrive sur cette page en cliquant sur un cinéma.
    //on va donc faire choisir à l'utilisateur un film parmi tous ceux proposés par ce cinéma 

    //si on arrive sur cette page sans avoir cliqué sur un cinéma, on renvoie à la liste des cinémas.
    if (!isset($_GET["cine"])) {
        header("location: index.html#cinema");
        exit();
    }

    include_once 'include/header.php';  //inclure le header 
    require_once 'include/bdd_script.php'; //pour la variable $conn
    require_once 'include/functions.php';  //fonctions générales
    require_once 'include/Cinéma.php';       //pour la classe Cinéma
    
    $ciné = new Cinéma($_GET["cine"], $conn); //instance de la classe Cinéma
    echo "<h1>" . $ciné->getNom() . "<br><br><br><br></h1>";

    echo '<img src="' . $ciné->getImage() . '">';
    ?>
    
    <div class="titre">
        <h2>Séances Disponibles</h2>
    </div>

    <form action="" method ="post">

        <label for="sort">Tri par date </label>
        <select name="sort" id="sort">
            <option value="Défaut">Défaut</option>
            <option value="Croissant">Récent -> Ancien</option>
            <option value="Décroissant">Ancien -> Récent</option>
        </select>
        <input type="submit" name="submit" value="trier">
    </form>
        
    <?php

    $sort = "Défaut";
    if(isset($_POST["submit"])){
        $sort = $_POST["sort"];
    }
    echo "Vous avez choisi " . $sort . "<br><br>";

    $array = array();
    $array = $ciné->getSeances(); //tableau de tableaux, chaque entrée représente une ligne de la table Séances
    
    echo '<ul>';

    for ($i = 0; $i<count($array); $i++){
        $IdSéance = $array[$i][0];
        $DateSéance = $array[$i][1];
        $RefFilm = $array[$i][2];
        $RefCine = $array[$i][3];

        echo '<li><a href="ordermovie.php?movie=' . $RefFilm . '">' . getNomFilm($conn, $RefFilm) . "</a>, " . $DateSéance;
        showButton($conn, $_SESSION["IdClient"], $IdSéance, $i); //affiche le bouton "réserver" si les conditions sont bonnes
        
        //si le bouton "Réserver a été pressé, on réserve la séance
        if(isset($_POST["reserver" . $i])){
            reserverSeance($conn, $_SESSION["IdClient"], $IdSéance);
        }
    }
    echo "</ul>";
    ?>

</body>

