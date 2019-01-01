<?php

var_dump($_POST);

session_start();
include("../config/database.php");

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $req = "SELECT * FROM popularites";

    $req = "INSERT INTO popularites(like_photo, commentaires, date_commentaires, id_user, id_galerie)
            VALUES(:like_photo, :commentaires, :date_commentaires, :id_user, :id_galerie)";

    $ret = $db->prepare($req);
    $ret->execute(array(
        'like_photo' => ,
        'commentaires' => htmlentities($_GET["chemin"]),
        'date_commentaires' => date("Y-m-d H:i:s"),
        'id_user' => $_SESSION["user"]["id"],
        'id_galerie' => $_SESSION["user"]["id"]
    ));
}
catch(Exception $e)
{
    echo $e;
}

?>