<?php

var_dump($_POST);

$id = htmlentities($_POST["id"]);

session_start();
include("../config/database.php");

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    if ($_POST["verif"] == "Like")
    {
        $req = "UPDATE popularites SET
                like_photo              = like_photo + 1,
                commentaires            = :commentaires,
                date_commentaires       = :date_commentaires
                WHERE id_galerie        = :idd";

        $ret = $db->prepare($req);
        var_dump($ret->execute(array(
            'commentaires'              => htmlentities($_POST["comment"]),
            'date_commentaires'         => date("Y-m-d H:i:s"),
            'idd'                       => $id
        )));
    }
    else
    {
        $req = "INSERT INTO popularites(like_photo, commentaires, date_commentaires, id_user, id_galerie)
            VALUES(:like_photo, :commentaires, :date_commentaires, :id_user, :id_galerie)";

        $ret = $db->prepare($req);
        $ret->execute(array(
            'like_photo'                => "0",
            'commentaires'              => htmlentities($_POST["comment"]),
            'date_commentaires'         => date("Y-m-d H:i:s"),
            'id_user'                   => $_SESSION["user"]["id"],
            'id_galerie'                => $_POST["id"]
        ));
    }
}
catch(Exception $e)
{
    echo $e;
}

?>