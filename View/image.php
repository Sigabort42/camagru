<?php
    session_start();
    foreach($_SESSION["galerie"] as $v)
    {
        if ($v["id"] == $_GET["id"])
            break;
    }
?>

<article class="image_galeries">
    <img class="image_solo" src="<?= $v["chemin"]; ?>" alt="<?= $v["nom"]; ?>"/>
    <h4><?= $v["nom"]; ?></h4>
    <h5><?= $v["date_prise"]; ?></h5>
    <input type="submit" class="like" data-value="Like" value="Like <?= $v["like_photo"];?>"/>
    <textarea name="comment" class="comment" cols="30" rows="10" placeholder="Commentaire" autocomplete="on"></textarea>
    <input type="submit" class="like" value="Commenter" />
    <aside class="comment">
    <div class="ok">
    </div>
        <?php foreach($_SESSION["galerie"] as $v) :?>
        <?php if ($v["id"] == $_GET["id"] && $v["commentaires"] != "") :?>
            <div class="ok">
                <em><p class="cm"><?= $v["commentaires"] ;?></p></em>
                <strong><p class="date_cm"><?= $v["date_commentaires"] ;?></p></strong>
            </div>
        <?php endif ;?>
        <?php endforeach ;?>
    </aside>
    <script src="js/add_comment.js"></script>
</article>