<?php

//si on arrive sur cette sans avoir cliqué sur un film, on renvoie à la liste des films.
if (!isset($_GET["movie"])) {
    header("location: include/redirect.php?dest=index.php");
    exit();
}

if (isset($_GET["error"])) {
    if ($_GET["errror"] == 1) {
        echo "<script>alert('Une erreur est survenue')</script>";
        header("location: index.html#films");
        exit();
    }
    if ($_GET["errror"] == 0) {
        echo "<script>alert('Séance réservée avec succès')</script>";
    }
}

session_start();
include_once 'include/header.php';
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
    <script src="https://code.jQuery.com/jquery-3.6.0.min.js"></script>
    <title>Réserver un film</title>
</head>
    
<script defer src = "include/ordermovie.js" >
<script src="/include/main.js"></script>
</script>

<body>

    <script>
        //script pour la navbar qui devient opaque 
        let header = document.querySelector('header');

        window.addEventListener('scroll', () => {
            header.classList.toggle('shadow', window.scrollY > 0);
        });
    </script>
    <?php

    //on arrive sur cette page en cliquant sur le bouton 'réserver' d'un film.
    //on va donc faire choisir à l'utilisateur un cinéma qui propose le film.


    include_once 'include/header.php';  //inclure le header 
    require_once 'include/bdd_script.php'; //pour la variable $conn
    require_once 'include/functions.php';  //au cas ou
    require_once 'include/Film.php';       //pour la classe Film



    $film = new Film($_GET["movie"], $conn);
    $array = array(); //tableau qui va contenir toutes les lignes de la table Séance
    $array = $film->getSeances(); //tableau de tableaux, chaque entrée est un tableau
    echo '<span id="' . $film->getId() . '"></span>'; //on crée ce span vide pour récupérer l'id du film dans JS
    echo "<br><br><br><br><br><br><br>";
    ?>

    <!-- AFFICHAGE DES INFOS DU FILM (NOM, IMAGE, ETC) -->
    <div class="movie-order">
        <div class="film-details">
            <img class="film-image" src="<?php echo $film->getImage(); ?>" alt="<?php echo $film->getNom(); ?>" width="200" height="275">
            
            
            
            <div class="film-info">
                <h2> <?php echo $film->getNom(); ?></h2>
                <span> <?php echo $film->getProducteur(); ?> </span>

                <a href="<?php echo $film->getBandeAnnonce(); ?>" target="_blank"><button class="btn-play"><i class="fa-regular fa-play play-movie"></i></button></a>
                <div class="tags">
                    <span><?php echo $film->getGenre(); ?></span>
                    <span><?php echo $film->getDuree(); ?></span>
                    <span><b>4K</b></span>
                </div>
            </div>

            
            <!--<div class="video-container">
                <div class="video-box">
                    <video id="video" src="<?php echo $film->getBandeAnnonce(); ?>" controls></video>
                    <i onclick="pause();"class="fa-regular fa-xmark close-video"></i>
            </div>-->
        </div> 
        

    </div>
    
       <span><?php if ($logedIn == true) {
                                echo "Loged in";
                            } else {
                                echo "Loged out";
                            } ?></span>

    <!--<span id="nbSeances"><?php echo "Séances Disponibles: " . count($array); ?></span>--> 

    <!--  AFFICHAGE DES SÉANCES -->
   
    <div class="liste-seances">
        <div class="titre">
            <h2>Séances Disponibles</h2>
        </div>
        

        <?php
        for ($i = 0; $i < count($array); $i++) {
            $IdSéance = $array[$i][0];
            $DateSéance = $array[$i][1];
            $RefFilm = $array[$i][2];
            $RefCine = $array[$i][3];
            

            echo '<div class="div" id="div' . $i . '">
            <h4 class="subtitle">' . getNomCine($conn, $RefCine) . "</h4>
            <button class='seance'><b>" . $DateSéance . "</b><br> VF, <i class='fa-regular fa-audio-description'></i></button>
            </div>
            ";
            
            /*echo '
                <div id=div' . $i . ' class="tags" >
                    <span>' . getNomCine($conn, $RefCine) .'  '. $DateSéance . '</span>
                </div>
                ';*/
        }
        
        ?>

        <div id="result">
            <button disabled class="btn-disabled">Réserver</button>
        </div>

    </div>

    <?php include_once 'include/copyright.php'; ?>

</body>

</html>