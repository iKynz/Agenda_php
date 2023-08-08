<?php

session_start();

include_once("url.php");
include_once("connection.php");

$data = $_POST;

if(!empty($_POST)) {

    if($data["type"] ===  "create") {
        $nome = $data["nome"];
        $phone = $data["phone"];
        $obervations = $data["obervations"];

        $query = "INSERT INTO contacts (nome, phone, obervations) VALUES (:nome, :phone, :obervations)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":obervations", $obervations);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso!";
            
        } catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    } else if($data["type"] === "edit") {
        $nome = $data["nome"];
        $phone = $data["phone"];
        $obervations = $data["obervations"];
        $id = $data["id"];

        $query = "UPDATE contacts SET nome = :nome, phone = :phone, obervations = :obervations WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":obervations", $obervations);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato editado com sucesso!";
            
        } catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    } else if($data["type"] === "delete") {
        $id = $data["id"];

        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato removido com sucesso!";
            
        } catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }

    header("location:" . $BASE_URL . "../index.php");

} else {

    $id;

    if(!empty($_GET)) {
        $id = $_GET["id"];
    }

    // Retorna o dado de um contato
    if(!empty($id)) {
        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $contact = $stmt->fetch();

    } else {    
        // Retorna todos os contatos
        $contacts = [];
   
        $query = "SELECT * FROM contacts";
   
        $stmt = $conn->prepare($query);
        $stmt->execute();
   
        $contacts = $stmt->fetchAll();
    }
}

$conn = null;