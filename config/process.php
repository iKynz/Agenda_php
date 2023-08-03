<?php

session_start();

include_once("url.php");
include_once("connection.php");

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