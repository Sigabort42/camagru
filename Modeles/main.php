<?php
session_start();
include("../config/database.php");

try
{
    $db     = new PDO("$DB_DSN;port=8889;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $resp   = $db->query("SELECT nom, chemin FROM img");
    $_SESSION["png"] = $resp->fetchAll();
    header("Location: /camagru/index.php");
}
catch(Exception $e)
{
    echo $e;
}
?>