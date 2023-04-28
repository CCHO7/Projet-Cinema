<?php

    //si on arrive sur cette sans avoir cliqué sur un film, on renvoie à la liste des films.
    if (!isset($_GET["movie"])){
        header("location: include/redirect.php?dest=index.php");
        exit();
    }

    if (isset($_GET["error"])){
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
    if(!isset($_SESSION["IdClient"])){
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
    <title>Réserver un film</title>
</head>
<body>

    <script> //script pour la navbar qui devient opaque 
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

    echo "<br><br><br><br><br><br><br>";

    ?>
    <!-- <div class="video">
            <iframe width="100%" height="500" src="<?php echo $film->getBandeAnnonce(); ?>" 
            title="bande_annonce" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen></iframe>
    </div>
    -->

    <script>
        const playIcon = document.querySelector('.play-icon');
        const bandeAnnonceUrl = '<?php echo $film->getBandeAnnonce(); ?>';

        playIcon.addEventListener('click', () => {
        window.location.href = bandeAnnonceUrl;
        });
    </script>

    <div class="movie-order">
        <div class="film-details">
            <img class="film-image" src="<?php echo $film->getImage(); ?>" alt="<?php echo $film->getNom(); ?>" width="200" height="275">
            
            <h1 class="film-title"><?php echo $film->getNom(); ?></h1>
            <div class="film-info">
                <span> <?php echo $film->getProducteur(); ?> </span>
                <div class="tags"> 
                    <span><?php echo $film->getGenre(); ?></span> 
                    <span><?php echo $film->getDuree(); ?></span>
                    <span><?php if($logedIn == true){echo "Loged in";} else{echo "Loged out";} ?></span>
                </div>
            </div>
            <div class="play-icon">
                <i class="fa-regular fa-play"></i>
            </div>
        </div>
    </div>

    
    
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
    $array = $film->getSeances(); //tableau de tableaux, chaque entrée représente une ligne de la table Séances
    
    echo '<ul>';

    for ($i = 0; $i<count($array); $i++){
        $IdSéance = $array[$i][0];
        $DateSéance = $array[$i][1];
        $RefFilm = $array[$i][2];
        $RefCine = $array[$i][3];

        echo '<li><a href="cinema.php?cine=' . $RefCine . '">' . getNomCine($conn, $RefCine) . '</a>, ' . $DateSéance;
        showButton($conn, $logedIn, $IdSéance, $i); //affiche le bouton "réserver" si les conditions sont bonnes
        
        //si le bouton "Réserver a été pressé, on réserve la séance
        if(isset($_POST["reserver" . $i])){
            if($logedIn == true){
                reserverSeance($conn, $_SESSION["IdClient"], $IdSéance);
                for ($j = 0; $i<count($_POST); $j++)
                {
                    unset($_POST["reserver" . $j]);
                }
                echo '<script>window.location.assign(ordermovie.php?movie=' . $film->getNom() . ');</script>';
            }
            else
            {
                echo '<script>alert("impossible, veuillez vous connecter");</script>';
            }
        }
    }
    echo "</ul>";

    ?>

</body>
