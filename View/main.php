<?php
    session_start();
?>
<!-- <style>
    .test
    {
        border: 2px solid red;
    }
    .tst
    {
        border: 2px solid blue;
    }
</style> -->
<main>
    <section class="image">
        <?php foreach($_SESSION["png"] as $value): ?>
            <input type="checkbox" data-chemin="<?= $value["chemin"] ;?>" name="<?= $value["nom"] ;?>"/>
            <img src="<?= $value["chemin"] ;?>" alt="<?= $value["nom"] ;?>"/>
        <?php endforeach ;?>
    </section>
    <section class="prise">
    <!-- <div class="test">allo</div>
    <div class="tst">lolol</div> -->
        <h1>Salut <em><?= $_SESSION["user"]["prenom"];?></em></h1>
        <article class="article">
        </article>
    </section>
    <section class="image_galerie">
        <canvas id="canvas"></canvas>
        <img id="photo">
    </section>
</main>