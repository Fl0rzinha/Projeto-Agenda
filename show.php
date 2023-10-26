<?php
    // header
    include_once("templates/header.php");
?>


    <!-- página de vizualização(ao se clicar na ação vizualizar em cada contato individual) -->


    <div class="container" id="view-contact-container">

        <!-- butao voltar -->
        <?php include_once("templates/backbtn.html"); ?>

        <h1 id="main-title"><?= $contact["name"] ?></h1>
        <p class="bold">Telefone:</p>
        <p class="form-control"><?= $contact["phone"] ?></p>
        <p class="bold">Observações:</p>
        <p class="form-control"><?= $contact["observations"] ?></p>

    </div>

<?php
    // footer
    include_once("templates/footer.php");
?>