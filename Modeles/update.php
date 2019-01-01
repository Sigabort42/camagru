<?php
session_start();
include("../config/database.php");

$old_email                  = $_SESSION['user']['old_email'];
$nom                        = $_SESSION['user']['nom'];
$prenom                     = $_SESSION['user']['prenom'];
$sexe                       = "autre";
$date                       = $_SESSION['user']['date'];
$email                      = $_SESSION['user']['email'];

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $req = "UPDATE user SET
            nom             = :nom,
            prenom          = :prenom,
            sexe            = :sexe,
            date_naissance  = :dates,
            email           = :email
            WHERE email     = :old_email";
    
    $ret = $db->prepare($req);
    $ret->execute(array(
        'nom'               => $nom,
        'prenom'            => $prenom,
        'sexe'              => $sexe,
        'dates'             => $date,
        'email'             => $email, 
        'old_email'         => $old_email
    ));
    $_SESSION["connected"] = "Les changements ont bien été appliqués!";
}
catch(Exception $e)
{
    echo $e;
}
header("Location: /camagru/index.php");

?>