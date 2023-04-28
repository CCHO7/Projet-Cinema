<?php

//si on arrive sur cette sans avoir cliqué sur un ciné, on renvoie à la liste des ciné.
if (!isset($_GET["cine"])) {
    header("location: include/redirect.php?dest=index.php#cinema");
    exit();
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
    <title>Cinéma</title>
</head>
    
<script defer src = "include/ordercine.js" >
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

    //on arrive sur cette page en cliquant sur un cinéma.
    //on va donc faire choisir à l'utilisateur une séance proposée par ce cinéma.


    include_once 'include/header.php';  //inclure le header 
    require_once 'include/bdd_script.php'; //pour la variable $conn
    require_once 'include/functions.php';  //au cas ou
    require_once 'include/Cinéma.php';       //pour la classe Cinéma 



    $ciné = new Cinéma($_GET["cine"], $conn); //instance de la classe Cinéma
    $array = array(); //tableau qui va contenir toutes les lignes de la table Séance
    $array = $ciné->getSeances(); //tableau de tableaux, chaque entrée est un tableau
    echo '<span id="' . $ciné->getId() . '"></span>'; //on crée ce span vide pour récupérer l'id du cinéma dans JS
    echo "<br><br><br><br><br><br><br>";
    ?>

    <!-- AFFICHAGE DES INFOS DU CINÉMA (NOM, IMAGE, ETC) -->
    <div class="movie-order">
        <div class="film-details">
            <img class="film-image" src="<?php echo $ciné->getImage(); ?>" alt="<?php echo $ciné->getNom(); ?>" width="200" height="275">

            
            <div class="film-info">
                <h2><?php echo $ciné->getNom(); ?></h2>
                <span><?php echo $ciné->getVille(); ?></span>

                <div class="tags">
                    
                    <span><?php if ($logedIn == true) {
                                echo "Loged in";
                            } else {
                                echo "Loged out";
                            } ?></span>
                    <span id="nbSeances"><?php echo count($array) . " Séances Disponibles " ; ?></span>
                    <span><i class="fa-regular fa-audio-description"></i></span>
                    <span><i class="fa-regular fa-wheelchair-move"></i></span>
                    <span><i class="fa-solid fa-panorama"></i></span>
                </div>
            </div>
            
        </div>
    </div>

    <!--  AFFICHAGE DES SÉANCES -->

    <div class="titre">
        <h2>Séances Disponibles</h2>
    </div>

    <?php

    for ($i = 0; $i < count($array); $i++) {
        $IdSéance = $array[$i][0];
        $DateSéance = $array[$i][1];
        $RefFilm = $array[$i][2];
        $RefCine = $array[$i][3];

        /*echo '<div id="div' . $i . '" style="background-color: red;">
            <h4>' . getNomFilm($conn, $RefFilm) . "</h4>
            <p>" . $DateSéance . "</p>
            </div>
        <br>";
        */

        echo '<div class="div" id="div' . $i . '">
            <h4 class="subtitle">' . getNomFilm($conn, $RefFilm) . "</h4>
            <button class='seance'><b>" . $DateSéance . "</b><br> VF, <i class='fa-regular fa-audio-description'></i></button>
            </div>
            ";
            
    }

    ?>

    <div id="result">
        <button disabled class="btn-disabled">Réserver</button>
    </div>

    <?php include_once 'include/copyright.php'; ?>

</body>

</html>