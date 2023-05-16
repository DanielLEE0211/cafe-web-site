<?php
include "bddData.php";

session_start();
$mysqli = new mysqli("localhost", "lovebarista1", "bdd123", "lovebarista");
if ($mysqli->connect_error) {
    die("La connexion a échoué: " . $mysqli->connect_error);
}

// Lecture du contenu du fichier SQL
$sqlFile = '../sql/lovebarista.sql';
$sql = file_get_contents($sqlFile);

// Exécution des instructions SQL séparément
$statements = explode(";", $sql);
foreach ($statements as $statement) {
    if (!empty(trim($statement))) {
        $result = $mysqli->query($statement);
        if (!$result) {
            echo "Erreur d'exécution de la requête : " . $mysqli->error;
        }
    }
}

//on récupere les produits depuis la base de données
$res=$mysqli->query("Select * from produits;");

if($res==true){
    $donnees=array();

    while($colonne=$res->fetch_assoc()){
        $donnees[]=$colonne;
    }
}else{
    echo "Erreur execution requete".$mysqli->error;
}


$res=$mysqli->query("Select * from produits;");

if($res==true){
    $donnees=array();

    while($colonne=$res->fetch_assoc()){
        $donnees[]=$colonne;
    }
    //print_r($donnees);
}else{
    echo "Erreur execution requete".$mysqli->error;
}
?>