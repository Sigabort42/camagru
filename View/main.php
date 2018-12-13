<?php
    session_start();
?>
<main>
    <section class="image">

    </section>
    <section class="prise">
        <h1>Bonjour <em><?= $_SESSION["user"]["prenom"];?></em></h1>
    </section>
    <section class="image_galerie">
        
    </section>
</main>