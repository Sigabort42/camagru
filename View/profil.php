<?php
    session_start();
?>
<section id="profil">
        <form method="POST" action="index.php?modif=1">
            <input type="text" name="nom" placeholder="Nom" value="<?= $_SESSION["user"]["nom"] ;?>"/>
            <input type="text" name="prenom" placeholder="Prenom" value="<?= $_SESSION["user"]["prenom"] ;?>"/>
            <input type="text" name="date" placeholder="Date de Naissance" value="<?= $_SESSION["user"]["date"] ;?>"/>
            <input type="text" name="email" placeholder="@" value="<?= $_SESSION["user"]["email"] ;?>"/>
            <a href="">Reinitialiser le mot de passe</a>
            <input class="submit" type="submit" name="submit" placeholder="Connecter" value="Modifier"/>
        </form>
</section>