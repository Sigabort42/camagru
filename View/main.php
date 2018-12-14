<?php
    session_start();
?>
<main>
    <section class="image">

    </section>
    <section class="prise">
        <h1>Salut <em><?= $_SESSION["user"]["prenom"];?></em></h1>
    </section>
    <section class="image_galerie">
        
    </section>
</main>