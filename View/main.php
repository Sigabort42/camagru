<?php
    session_start();
?>
<main>
    <section class="image">
        <?php foreach($_SESSION["png"] as $value): ?>
            <input type="checkbox"/>
            <img src="<?= $value["chemin"] ;?>" alt="<?= $value["nom"] ;?>"/>
        <?php endforeach ;?>
    </section>
    <section class="prise">
        <h1>Salut <em><?= $_SESSION["user"]["prenom"];?></em></h1>
    </section>
    <section class="image_galerie">
        
    </section>
</main>