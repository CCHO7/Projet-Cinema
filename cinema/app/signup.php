<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style1.css">
    <script src="https://kit.fontawesome.com/927b94a7cf.js" crossorigin="anonymous"></script>
    <title>Se connecter</title>
</head>
<body>
    <style>
        body{
            /*background-image: linear-gradient(90deg, rgba(201,63,63,1) 0%, rgba(0,0,0,1) 50%, rgba(201,63,63,1) 100%),url(images/background-login.jpeg);*/
            width:100%;
            height:100vh;
            background-image: linear-gradient(1deg, rgba(0,0,0,1) 0%, rgba(126,159,195,0.3435749299719888) 100%),url('images/background-login.jpeg');
            background-size: cover;
            background-position: center;
        }
   
    </style>

    <? include_once 'include/header.php'; ?>


    <br><br><br><br><br><br><br>
    <div class="wrapper-register">
        <div class="form-box login">
            <h2>S'inscrire</h2>
            <form action="include/signup_script.php" method="post">
                <div class="input-box">
                    <input type="text" name="nom" placeholder="Nom">
                </div>
                <div class="input-box">
                    <input type="text" name="prenom" placeholder="Prénom">
                </div>
                <div class="input-box">
                    <input type="text" name="email" placeholder="Adresse mail">
                </div>
                <div class="input-box">
                    <input type="password" name="mdp" placeholder="Mot de passe">
                </div>
                <div class="input-box">
                    <input type="password" name="remdp" placeholder="Retaper mot de passe">
                </div>
                <button type="submit" name="submit" class="btn-login">S'inscrire</button>
            </form>
        </div>     
    </div>
    <br>



    <!-- affichage de messages d'erreur en fonction de l'url -->
    <?php
        if(isset($_GET["error"])){
        
            switch($_GET["error"]){
                case "emptyinput":
                    echo "<p><b>Erreur: Veuillez renseigner tous les champs!</b></p>";
                    break;
                case "invalidemail":
                    echo "<p><b>Erreur: Veuillez renseigner une adresse mail valide!</b></p>";
                    break;
                case "pwdmatch":
                    echo "<p><b>Erreur: Les mots de passe ne sont pas identiques!</b></p>";
                    break;
                case "emailtaken":
                    echo "<p><b>Erreur: Cette adresse mail est déjà utilisée pour un autre compte!</b></p>";
                    break;
                case "sqlerror":
                    echo "<p><b>Erreur: Une erreur est survenue, veuillez réessayer.</b></p>";
                    break;
                case "none":
                    echo "<p><b>Votre compte a été crée avec succès, bienvenue!</b></p>";
                    break;
            }
        }

    ?>

</body>
</html>
