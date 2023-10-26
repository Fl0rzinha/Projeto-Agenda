<?php


    // página de listagem (lista de todos os contatos)


    include_once("templates/header.php");
?>
    <div class="container">

    <!-- exibe mensagem de cada operação crud (se existir)
    obs: nota as mensagens de erro e sucesso em config/process.php 
    -->
    <?php if(isset($printMsg) && $printMsg != ''): ?>
        <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>

    <h1 id="main-title">Minha Agenda</h1>

    <!-- Exibe a tabela se houver contatos -->
    <?php if(count($contacts) > 0) : ?>
        <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Home</th>
                    <th scope='col'>Telefone</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody>

            <!-- o código percorre o array de $contacts e imprime os dados de cada um em uma linha da tabela, com botões de editar e ecluir. -->
            <?php foreach($contacts as $contact): ?>
                <tr>
                    <td scope="row" class="col-id"><?= $contact["id"] ?></td>
                    <td scope="row"><?= $contact["name"] ?></td>
                    <td scope="row"><?= $contact["phone"] ?></td>

                    <!-- botoes de ação para cada contato (vizualizar, editar e excluir) -->
                    <td class="actions">
                        <a href="<?= $BASE_URL ?>show.php?id=<?= $contact["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                        <a href="<?= $BASE_URL ?>edit.php?id=<?= $contact["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                        <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                            <input type="hidden" name="type" value="delete">
                            <input type="hidden" name="id" value="<?= $contact["id"] ?>">
                            <button type="submit" onclick="confirmDelete()" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>

            <!-- exibe mensagem (ainda não há contatos na sua agenda) se não tiver contatos -->
            <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
            <?php endif; ?>
    </div>

    <script>

        // função para confirmar exclusão de contato (no alert do navegador)
        function confirmDelete() {
            let confirmDelete = confirm("Tem certeza que deseja excluir este contato?");
            if(!confirmDelete) {
                event.preventDefault();
            }
        }
    </script>

<?php
    // inclui footer
    include_once("templates/footer.php");
?>