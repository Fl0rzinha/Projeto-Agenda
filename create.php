<?php

// pag de criação


// inclue o header da pag
    include_once("templates/header.php");
?>
    <div class="container">

    <!-- inclui o botão de voltar -->
    <?php include_once("templates/backbtn.html"); ?>

    <h1 id="main-title">Criar contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">

        <!-- campos do formulário para entrada de dados do contato -->
        <div class="form-froup">
            <label for="name">Nome do contato: </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o seu nome" requided>
        </div>

        <div class="form-froup">
            <label for="namphone">Telefone do contato: </label>
            <input type="text" class="form-control" id="namphone" name="phone" placeholder="Digite o seu telefone" requided>
        </div>

        <div class="form-froup">
            <label for="observations">Observações: </label>
            <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Insira as observações" rows="3"></textarea>
        </div>

        <!-- botao para submeter o formulário -->
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
    </div>

<?php
// incluir o footer
    include_once("templates/footer.php");
?>