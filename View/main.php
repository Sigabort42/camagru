<?php
    session_start();
?>
<main>
    <section class="image">
        <?php foreach($_SESSION["png"] as $value): ?>
            <input type="checkbox" data-chemin="<?= $value["chemin"] ;?>" name="<?= $value["nom"] ;?>"/>
            <img src="<?= $value["chemin"] ;?>" alt="<?= $value["nom"] ;?>"/>
        <?php endforeach ;?>
    </section>
    <section class="prise">
        <h1>Salut <em><?= $_SESSION["user"]["prenom"];?></em></h1>
        <article class="article">
        </article>
    </section>
    <section class="image_galerie">
        <canvas id="canvas"></canvas>
        <!-- <img src="" id="photo"> -->
    </section>
</main>