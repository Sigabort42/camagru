<?php
session_start();
?>
<footer>
        <?php if (empty($_SESSION["user"])) :?>
        <nav>
            <a href="index.php?choice=1">Se Connecter</a>
            <a href="index.php?choice=2">Inscription</a>
            <a href="index.php?choice=3">Galerie</a>
        </nav>
    <?php else :?>
        <nav>
            <a href="index.php?choice=5">Mes Images</a>
            <a href="index.php?choice=6">Profil</a>
            <a href="index.php?choice=4">Deconnexion</a>
        </nav>
    <?php endif ;?>
</footer>