<?php
    session_start();
    foreach($_SESSION["galerie"] as $v)
    {
        if ($v["id"] == $_GET["id"])
            break;
    }
?>

<article class="image_galeries">
    <script src="js/lol.js"></script>
    <img class="image_solo" src="<?= $v["chemin"]; ?>" alt="<?= $v["nom"]; ?>"/>
    <h4><?= $v["nom"]; ?></h4>
    <h5><?= $v["date_prise"]; ?></h5>
    <input type="submit" class="like" value="Like"/>
    <textarea name="comment" class="comment" cols="30" rows="10" placeholder="Commentaire" autocomplete="on"></textarea>
    <!-- <input type="submit" class="like" value="Commenter" /> -->
</article>