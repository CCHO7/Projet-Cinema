<?php


//retourne true si l'un des champs n'a pas été rempli
function emptyInput($nom, $prenom, $email, $mdp, $remdp){
    if(empty($nom) || empty($prenom) || empty($email) || empty($mdp) || empty($remdp)){
        $res = true;
    }
    else{
        $res = false;
    }
    return $res;
}

function emptyInputLogin($email, $mdp){
    if(empty($email) || empty($mdp)){
        $res = true;
    }
    else{
        $res = false;
    }
    return $res;
}

//retourne true si l'adresse mail n'est pas une adresse valide
function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $res = true;
    }
    else{
        $res = false;
    }
    return $res;
}

//retourne true si les mots de passe ne sont pas identiques
function pwdDontMatch($mdp, $remdp){
    if ($mdp !== $remdp){
        $res = true;
    }
    else{
        $res = false;
    }
    return $res;
}

//vérifie qu'il n'existe pas de compte associé à ce mail
//retourne true si le mail est déjà utilisé par un autre compte
function emailTaken($conn, $email){
    $res = false;
    $sql = "SELECT * FROM Client WHERE EmailClient = ?;";

    $statement = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../signup.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    
    if ($row = mysqli_fetch_assoc($result)){
        $res = true;
    }
    
    mysqli_stmt_close($statement);
    return $res;
}

//ajoute une ligne à la table Client, et renvoie l'utilisateur à la page d'accueil
function createUser($conn, $nom, $prenom, $email, $mdp){

    $sql = "INSERT INTO Client(NomClient, PrenomClient, EmailClient, MdpClient) VALUES(?, ?, ?, ?);";
    $hash = password_hash($mdp, PASSWORD_DEFAULT);

    $statement = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../signup.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ssss", $nom, $prenom, $email, $hash);
    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);
    header("location: ../profile.php");
    exit();
}

function loginUser($conn, $email, $mdp){
    $emailTaken = emailTaken($conn, $email); //true si le mail est présent dans la db

    if ($emailTaken === false){
        header("location: ../login.php?error=unknownemail");
        exit();
    }

    $sql = "SELECT * FROM Client WHERE EmailClient = ?;";

    $statement = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../login.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);
    
    $hash = $row["MdpClient"];

    //vérifie que le mot de passe saisi correspond à celui dans la bd:
    if(password_verify($mdp, $hash) === false){
        header("location: ../login.php?error=wrongpwd");
        exit();
    }

    //maintenant que l'utilisateur est connecté, on crée une session pour qu'il reste connecté
    //on crée des variables de session permettant d'accéder aux champs de l'utilisateur facilement
    session_start();
    $_SESSION["IdClient"] = $row["IdClient"];
    $_SESSION["NomClient"] = $row["NomClient"];
    $_SESSION["PrenomClient"] = $row["PrenomClient"];
    $_SESSION["EmailClient"] = $row["EmailClient"];

    header("location: ../profile.php"); //renvoie l'utilisateur à l'accueil
    exit();
}

//retourne le nom d'un ciné à partir de son id
function getNomCine($conn, $id){
    
    $sql = "SELECT * FROM Cinéma WHERE IdCine = ?;";
    $statement = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../index.html");
        exit();
    }
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);

    return $row["NomCine"];
}

//retourne le nom d'un film à partir de son id
function getNomFilm($conn, $id){
    
    $sql = "SELECT * FROM Film WHERE IdFilm = ?;";
    $statement = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../index.html");
        exit();
    }
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);

    return $row["NomFilm"];
}

function reserverSeance($conn, $idClient, $idSéance){
    
    $sql = "INSERT INTO Réservation(DateRéservation, RefClient, RefSéance) VALUES(?, ?, ?);";
    $date = date("Y-m-d");

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../ordermovie.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($statement, "sii", $date, $idClient, $idSéance);
    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);

}

//vérifie que l'utilisateur soit connecté, et la séance pas déjà réservée
function showButton($conn, $logedIn, $idSéance, $i){

    //si le client est connecté, on vérifie qu'il n'ait pas déjà réservé la séance
    if($logedIn == true){

        $sql = "SELECT * FROM Réservation WHERE RefClient = ? AND RefSéance = ?;";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("location: ../index.html");
            exit();
        }
        mysqli_stmt_bind_param($statement, "ii", $_SESSION["IdClient"], $idSéance);
        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);

        if ($row = mysqli_fetch_assoc($result)) { //la séance est déjà réservée
            echo '<br><button style="opacity: 0.6; cursor: not-allowed">Réservée</button>';
            return;
        }
    }

    echo ' <form method="post"><input type="submit" name="reserver' . $i . '" value="Réserver"></form></li>';
}

//retourne les lignes de la table Réservation correspondantes au client
function getReservationsClient($conn, $idClient){
    
    $sql = "SELECT * FROM Réservation WHERE RefClient = ?;";
    $statement = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../index.html");
        exit();
    }
    mysqli_stmt_bind_param($statement, "i", $idClient);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $array = mysqli_fetch_all($result, MYSQLI_NUM);

    return $array;
}

//affichage formatté des réservations du client
function printReservations($array, $conn){
    include_once 'Séance.php';
    for($i = 0; $i<count($array); $i++){
        $séance = new Séance($array[$i][3], $conn);
        echo "<div style='background-color: #92222b; border-radius: 6px;'>";

        echo '<p><a href="ordermovie.php?movie=' . $séance->getRefFilm() . '"><h3>' . $séance->getNomFilm() . '</h3></a></p>';
        echo '<p><a href="cinema.php?cine=' . $séance->getRefCine() . '">' . $séance->getNomCine() . '</a></p>';
        echo "<p>Date Séance: " . $séance->getDate() . "</p>";
        echo "<p>Date Réservation: " . $array[$i][1] . "</p>";
        echo "</div><br>";
    }
}