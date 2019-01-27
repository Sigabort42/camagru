<?php

session_start();
include("../config/database.php");

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $req = "INSERT INTO galerie(nom, chemin, date_prise, id_user)
            VALUES(:nom, :chemin, :date_prise, :id_user)";

    $ret = $db->prepare($req);
    var_dump($_SESSION["user"]);
    var_dump($ret->execute(array(
        'nom'               => $_SESSION['user']['prenom'],
        'chemin'            => htmlentities($_GET["chemin"]),
        'date_prise'        => date("Y-m-d H:i:s"),
        'id_user'           => $_SESSION["user"]["id"]
    )));
    $resp = $db->query("SELECT id FROM galerie");
    // $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $req = "INSERT INTO popularites(like_photo, commentaires, date_commentaires, id_user, id_galerie)
            VALUES(:like_photo, :commentaires, :date_commentaires, :id_user, :id_galerie)";

    $ret = $db->prepare($req);
    $ret->execute(array(
        'like_photo'        => "0",
        'commentaires'      => htmlentities($_POST["comment"]),
        'date_commentaires' => date("Y-m-d H:i:s"),
        'id_user'           => $_SESSION["user"]["id"],
        'id_galerie'        => count($resp->fetchAll())
    ));
}
catch(Exception $e)
{
    echo $e;
}

?>