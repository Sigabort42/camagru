<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/header.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/galerie.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/connexion.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/inscription.css" />
</head>
<body>

    <?php include("header.php") ;?>
    <?php if (isset($_GET["erreur"])) :?>
        <strong class="bienvenue"><?= $_GET["erreur"] ;?></strong>
        <?php unset($_SESSION["connected"]);?>
    <?php endif ;?>
    <?php if (isset($_SESSION["connected"])) :?>
        <strong class="bienvenue"><?= $_SESSION["connected"] ;?></strong>
        <?php unset($_SESSION["connected"]);?>
    <?php endif ;?>
    <?php if (isset($_GET["id"])) :?>
        <?php include("image.php") ;?>
    <?php elseif (empty($_GET["erreur"]) && isset($_SESSION["user"]) && empty($_GET["choice"])): ?>
        <?php include("main.php") ;?>
        <script src="js/main.js"></script>
    <?php elseif ($_GET["choice"] == '1' || empty($_GET["choice"])): ?>
        <?php include("Connexion.html") ;?>
        <script src="js/verif.js"></script>
    <?php elseif ($_GET["choice"] == '2'): ?>
        <?php include("inscription.html") ;?>
        <script src="js/verif.js"></script>
    <?php elseif ($_GET["choice"] == "6") :?>
        <?php include("profil.php") ;?>
    <?php elseif ($_GET["choice"] == "5") :?>
        <?php include("mes_images.php") ;?>
    <?php elseif ($_GET["choice"] == "7") :?>
        <?php include("update_password.php") ;?>
    <?php else :?>
        <?php include("galerie.php") ;?>
    <?php endif ;?>
    <?php if (isset($_GET) && $_GET["choice"] != "3" && $_GET["choice"] != "5") :?>
        <?php include("footer.php") ;?>
    <?php endif ;?>
</body>
</html>