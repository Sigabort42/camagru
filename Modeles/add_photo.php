<?php

session_start();
include("../config/database.php");

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $req = "INSERT INTO galerie(nom, chemin, date_prise, id_user, id_popularites)
            VALUES(:nom, :chemin, :date_prise, :id_user, :id_popularites)";

    $ret = $db->prepare($req);
    $ret->execute(array(
        'nom' => "lollll",
        'chemin' => htmlentities($_GET["chemin"]),
        'date_prise' => date("Y-m-d H:i:s"),
        'id_user' => $_SESSION["user"]["id"],
        'id_popularites' => $_SESSION["user"]["id"]
    ));
}
catch(Exception $e)
{
    echo $e;
}

?>