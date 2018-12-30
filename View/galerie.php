<?php
    session_start();
?>

<section id="galerie">
    <?php foreach($_SESSION["galerie"] as $v) :?>
        <aside class="aside">
            <img class="img_galerie" src="<?= $v["chemin"]; ?>" alt="<?= $v["nom"]; ?>"/>
            <h4><?= $v["nom"]; ?></h4>
            <h5><?= $v["date_prise"]; ?></h5>
        </aside>
    <?php endforeach ;?>
</section>