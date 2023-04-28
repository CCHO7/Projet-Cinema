
<?php

require_once 'functions.php';

class Séance 
{
    private $idSéance;
    private $refFilm;
    private $refCine;
    private $dateSéance;
    private $nomFilm;
    private $nomCine;
    private $conn;

    function __construct($id, $conn){

        $sql = "SELECT * FROM Séance WHERE IdSéance = ?;";

        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("location: index.php");
            exit();
        }

        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);

        $this->conn = $conn;
        $this->idSéance = $row["IdSéance"];
        $this->refFilm = $row["RefFilm"];
        $this->refCine = $row["RefCine"];
        $this->dateSéance = $row["DateSéance"];
        $this->nomFilm = getNomFilm($conn, $this->refFilm);
        $this->nomCine = getNomCine($conn, $this->refCine);

        if ($this->idSéance == ""){
            header("location: index.php");
            exit();
        }
    }

    function getId(){
        return $this->idSéance;
    }

    function getNomFilm(){
        return $this->nomFilm;
    }

    function getNomCine(){
        return $this->nomCine;
    }
    
    function getDate(){
        return $this->dateSéance;
    }

    function getRefFilm(){
        return $this->refFilm;
    }

    function getRefCine(){
        return $this->refCine;
    }

}

?>