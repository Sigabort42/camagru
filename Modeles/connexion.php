<?php
session_start();

include("../config/database.php");

$email = $_SESSION["verif_user"]["email"];
$pass = $_SESSION["verif_user"]["pass"];

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $resp = $db->query("SELECT * FROM user");
    while ($donnees = $resp->fetch())
    {
        if ($donnees["email"] == $email && password_verify($pass, $donnees["pass"]))
        {
            $_SESSION["connected"] = "Bienvenue !";
            $_SESSION['user']['id'] = $donnees["id"];
            $_SESSION['user']['nom'] = $donnees["nom"];
            $_SESSION['user']['prenom'] = $donnees["prenom"];
            $_SESSION['user']['sexe'] = $donnees["sexe"];
            $_SESSION['user']['date'] = $donnees["date"];
            $_SESSION['user']['email'] = $donnees["email"];
            $_SESSION['user']['pass'] = $donnees["pass"];
        }
    }
    if (empty($_SESSION["connected"]))
        $_SESSION["connected"] = "Erreur lors de l'identification!";
}
catch(Exception $e)
{
    echo $e;
}

header("Location: /camagru/index.php");
?>