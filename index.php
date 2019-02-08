<?php

session_start();

// En GET choice
// 1 == connexion
// 2 == inscription
// 3 == galerie
// 4 == deconnexion
// 5 Mes images
// 6 Profil
// 7 reinitialise

// echo "salut toi comment tu va";

// var_dump($_POST);

if (isset($_GET["choice"]) && $_GET["choice"] == "4")
{
    session_destroy();
    header("Location: index.php");
    exit();
}
else if (empty($_GET["erreur"]) && empty($_SESSION["png"]) && empty($_GET["choice"]))
{
    header("Location: /camagru/Modeles/main.php");
    exit();
}
else if (isset($_POST["submit"]) && $_POST["submit"] == "Inscription")
{
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $date = htmlentities($_POST["date"]);
    $email = htmlentities($_POST["email"]);
    $pass = htmlentities($_POST["pass"]);
    $_SESSION["user"] = array(
                                "nom"           => $nom,
                                "prenom"        => $prenom,
                                "date"          => $date,
                                "email"         => $email,
                                "pass"          => $pass,
                            );
    header("Location: /camagru/Modeles/inscription.php");
    exit();
}
else if (isset($_POST["submit"]) && $_POST["submit"] == "Connexion")
{
    $email = htmlentities($_POST["email"]);
    $pass = htmlentities($_POST["pass"]);
    $_SESSION["verif_user"] = array(
                                    "email"     => $email,
                                    "pass"      => $pass
                                );
    header("Location: /camagru/Modeles/connexion.php");
    exit();
}
else if (isset($_GET["choice"]) && $_GET["choice"] == "3" && empty($_GET["ok"]))
{
    header("Location: /camagru/Modeles/galerie.php");
    exit();
}
else if (isset($_GET["modif"]) && $_GET["modif"] == "1")
{
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $date = htmlentities($_POST["date"]);
    $email = htmlentities($_POST["email"]);
    $_SESSION["user"] = array(
                                "old_email"     => $_SESSION["user"]["email"],
                                "nom"           => $nom,
                                "prenom"        => $prenom,
                                "date"          => $date,
                                "email"         => $email,
                            );
    header("Location: /camagru/Modeles/update.php");
    exit();
}
include("View/accueil.php");

?>