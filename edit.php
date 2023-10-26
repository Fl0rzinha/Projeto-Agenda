<?php

    // pag de atualização


    // header
    include_once("templates/header.html");
?>
    <div class="container">
        
        <!-- botao voltar -->
        <?php include_once(templates/backbtn.html); ?>

        <h1 id="main-title">Editar contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>configprocess.php" method="POST">
            <input type="hidden" name="type" value="edit">

            <!-- ID do contato a ser editado -->
            <input type="hidden" name="id" value="<?= $contact['id'] ?>">

            <!-- campos do formulário preenchidos com os dados do contato -->
            <div class="form-group">
                <label for="name">Nome do contato:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?= $contact['name'] ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Telefone do contato:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" value="<?= $contact['phone'] ?>" required>
            </div>

            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Insira as observações" rows="3"><?= $contact['observations'] ?></textarea>
            </div>

            <!-- btn atualizar -->
            <button type="submit" class="btn btn-primary">Atualizar</button>

        </form>
    </div>

<?php
    // inclue o footer na página
    include_once("templates/footer.php");
?>