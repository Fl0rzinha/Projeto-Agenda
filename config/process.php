<?php

//Inicia a sessão
session_start();

// inclui arquivos de conexão ao banco e funcionalidades
include_once("connection.php");
include_once("url.php");

// recebe dados do formulário via POST
$data = $_POST;



// Modificaç~çoes no banco (crud - create, read, update, delete)
if(!empty($data)) {

    // criar contato(create)
    if($data['type'] === "create") {

        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        // query de inserção com placeholders
        $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

        // prepara query
        $stmt = $conn->prepare($query);

        // substitui placeholders.

        // bindparam() é um método do objeto PDO statment que associa uma variável PHP a um placeholder na query SQL preparada.

        // No exemplo, a query contém o placeholder :nome. Esta linha faz o bind da variável PHP $name para esse placeholder.

        // Quando a query for executada, o PDO irá substituir :name pelo valor atual de $name de forma segura, evitando SQL injection (invasão).
        $stmt->bindParam(":name", $name);

        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try {
            // executa a query
            $stmt->execute();

            // mensagem de sucesso caso aconteça
            $_SESSION["msg"] = "Contato criado com sucesso!";

        } catch(PDOException $e) {
            // captura erros
            $error = $e->getMessage();
            echo "Erro: $error";
        }




    } else if($data["type"] === "edit") {

        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];
        $id = $data["id"];

        // query de atualização
        $query = "UPDATE contacts
                SET name = :name, phone = :phone, observations = :observations
                WHERE id = :id";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindPAram(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato atualizado com sucesso!";

        } catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }




    } else if($data["type"] === "delete") {

        $id = $data["id"];

        // query de remoção
        $query = "DELETE FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato removido com sucesso!";

        } catch(PDOException $e) {
            // erro na conexão
            $error = $getMessage();
            echo "Erro: $error";
        }

    }




    header("Location:" . $BASE_URL . "../index.php");


} else {

    $id;


    if(!empty($_GET)) {
        $id = $_GET["id"];
    }


    if(!empty($id)) {

        // query de seleção
        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $contact = $stmt->fetch();

    } else {

        // retorna todos os contatos
        $contacts = [];

        // query de seleção de todos os contatos
        $query = 'SELECT * FROM contacts';

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();

    }

}

// fechar conexão
$conn = null;