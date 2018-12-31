<?php
    session_start();
    foreach($_SESSION["galerie"] as $v)
    {
        if ($v["id"] == $_GET["id"])
            break;
    }
?>

<article class="image_galerie">
    <img class="image_solo" src="<?= $v["chemin"]; ?>" alt="<?= $v["nom"]; ?>"/>
    <h4><?= $v["nom"]; ?></h4>
    <h5><?= $v["date_prise"]; ?></h5>
    <button class="like">Like</button>
    <!-- <input class="comment" type="text" placeholder="Commentaire"/> -->
    <textarea name="comment" class="comment" cols="30" rows="10" placeholder="Commentaire" autocomplete="on"></textarea>
    <button class="like">Commenter</button>
</article>