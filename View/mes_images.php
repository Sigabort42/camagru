<?php
    session_start();
?>

<section id="galerie">
    <?php foreach($_SESSION["galerie"] as $v) : ?>
        <?php if ($v["id_user"] == $_SESSION["user"]["id"]) :?>
            <aside class="aside">
                <a href="index.php?id=<?= $v["id"]; ?>">
                    <img class="img_galerie" src="<?= $v["chemin"]; ?>" alt="<?= $v["nom"]; ?>"/>
                    <h4><?= $v["nom"]; ?></h4>
                    <h5><?= $v["date_prise"]; ?></h5>
                </a>
            </aside>
        <?php endif ;?>
    <?php endforeach ;?>
</section>