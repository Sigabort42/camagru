<?php
session_start();

include("../config/database.php");

$nom = $_SESSION['user']['nom'];
$prenom = $_SESSION['user']['prenom'];
$sexe = "autre";
$date = $_SESSION['user']['date'];
$email = $_SESSION['user']['email'];
$pass = password_hash($_SESSION['user']['pass'], PASSWORD_BCRYPT);

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $req = "INSERT INTO user(nom, prenom, sexe, date_naissance, email, pass)
            VALUES(:nom, :prenom, :sexe, :dates, :email, :pass)";
    
    
    $ret = $db->prepare($req);
    $ret->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'sexe' => $sexe,
        'dates' => $date,
        'email' => $email, 
        'pass' => $pass
    ));
    $_SESSION["connected"] = "Bienvenue!";
}
catch(Exception $e)
{
    echo $e;
}
header("Location: /camagru/index.php");