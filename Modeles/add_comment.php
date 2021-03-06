<?php

$id = htmlentities($_POST["id"]);

session_start();
include("../config/database.php");

if (empty($_SESSION["user"]))
{
    $_SESSION["connected"] = "Veuillez vous connecter";
    echo "Veuillez vous connecter";
    exit;
}
else if (!$_SESSION["user"]["like_photo_id"])
{
    $_SESSION["user"]["like_photo_id"] = array();
}

try
{
    $db = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    if ($_POST["verif"] == "Like")
    {
        if (in_array($id, $_SESSION["user"]["like_photo_id"]))
        {
            unset($_SESSION["user"]["like_photo_id"][array_search($id, $_SESSION["user"]["like_photo_id"])]);
            $_SESSION["user"]["like_photo_id"] = array_values($_SESSION["user"]["like_photo_id"]);
            $req = "UPDATE popularites SET like_photo = like_photo - 1 WHERE id_galerie = :idd";
        }
        else
        {
            array_push($_SESSION["user"]["like_photo_id"], $id);
            $req = "UPDATE popularites SET like_photo = like_photo + 1 WHERE id_galerie = :idd";
        }
        $ret = $db->prepare($req);
        $ret->execute(array('idd' => $id));
        $req = $db->query("SELECT like_photo FROM popularites WHERE id_galerie = $id");
        $ret = Array("like_photo" => $req->fetch()["like_photo"], "mode" => "0");
        echo json_encode($ret);
    }
    else
    {
        $date = date("Y-m-d H:i:s");
        $req = "INSERT INTO popularites(like_photo, commentaires, date_commentaires, id_user, id_galerie)
            VALUES(:like_photo, :commentaires, :date_commentaires, :id_user, :id_galerie)";

        $ret = $db->prepare($req);
        $ret->execute(array(
            'like_photo'                => "0",
            'commentaires'              => htmlentities($_POST["comment"]),
            'date_commentaires'         => $date,
            'id_user'                   => $_SESSION["user"]["id"],
            'id_galerie'                => $id
        ));
        $ret = Array("comment" => htmlentities($_POST["comment"]), "mode" => "1", "date_comment" => $date);
        echo json_encode($ret);
    }
}
catch(Exception $e)
{
    echo $e;
}

?>