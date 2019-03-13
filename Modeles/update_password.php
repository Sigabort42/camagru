<?php

session_start();
include("../config/database.php");

$old_email = $_SESSION["user"]["email"];
$pass = password_hash($_SESSION["user"]["new_pass"], PASSWORD_BCRYPT);

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $req = "UPDATE user SET
            pass            = :pass
            WHERE email     = :old_email";
    
    $ret = $db->prepare($req);
    $ret->execute(array(
        'pass'              => $pass,
        'old_email'         => $old_email
    ));
    $_SESSION["connected"] = "Le mot de passe à bien ete change !";
}
catch(Exception $e)
{
    echo $e;
}
header("Location: /camagru/index.php");


?>