<?php

session_start();
include("../config/database.php");

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $resp = $db->query("SELECT galerie.id, nom, chemin, date_prise, galerie.id_user, like_photo, commentaires, date_commentaires, id_galerie
                        FROM galerie
                        INNER JOIN popularites ON popularites.id_galerie = galerie.id");
    $_SESSION["galerie"] = $resp->fetchAll();
    $resp = $db->query("SELECT * FROM galerie");
    $_SESSION["galeries"] = $resp->fetchAll();
    header("Location: /camagru/index.php?choice=3&ok=1");
}
catch(Exception $e)
{
    echo $e;
}

?>