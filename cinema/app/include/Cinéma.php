<?php

require_once 'functions.php';

class Cinéma 
{
    private $idCiné;
    private $nomCiné;
    private $villeCiné;
    private $image;
    private $conn;

    function __construct($id, $conn){

        $sql = "SELECT * FROM Cinéma WHERE IdCine = ?;";

        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("location: cinema.php?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);

        $this->conn = $conn;
        $this->idCiné = $row["IdCine"];
        $this->nomCiné = $row["NomCine"];
        $this->villeCiné = $row["Ville"];
        $this->image = $row["ImageCine"];

        if ($this->idCiné == ""){
            //header("location: cinema.php?error=noid");
            echo "<h2>ERREUR: idCiné NULL</h2>";
            exit();
        }
    }

    function getId(){
        return $this->idCiné;
    }

    function getNom(){
        return $this->nomCiné;
    }

    function getVille(){
        return $this->villeCiné;
    }

    function getImage(){
        return $this->image;
    }

    function getSeances(){
        $sql = "SELECT * FROM Séance WHERE RefCine = ?;";

        $statement = mysqli_stmt_init($this->conn);
        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("location: ordermovie.php?error=1");
            exit();
        }

        mysqli_stmt_bind_param($statement, "i", $this->idCiné);
        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);

        $array = mysqli_fetch_all($result, MYSQLI_NUM); //tableau de tableaux associatifs, chaque entrée représente une ligne de la table
        return $array;
    }
}

?>