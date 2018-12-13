<?php

session_start();

// 1 == connexion
// 2 == inscription
// 3 == galerie
// 4 == deconnexion

// echo "salut toi comment tu va";

// var_dump($_POST);

if (isset($_POST["submit"]) && $_POST["submit"] == "Inscription")
{
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $date = htmlentities($_POST["date"]);
    $email = htmlentities($_POST["email"]);
    $pass = htmlentities($_POST["pass"]);
    $_SESSION["user"] = array(
                                "nom" => $nom,
                                "prenom" => $prenom,
                                "date" => $date,
                                "email" => $email,
                                "pass" => $pass,
                            );
    header("Location: /camagru/Modeles/inscription.php");
}
include("View/accueil.php");

?>