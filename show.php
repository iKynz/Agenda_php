<?php
    include_once("templates/header.php");
?>
    <div class="container" id="view-contact-container">
        <h1 id="main-title"><?= $contact["nome"] ?></h1>
        
        <p class="bold">Telefone:</p>
        <p><?= $contact["phone"] ?></p>

        <p class="bold">Observações:</p>
        <p><?= $contact["obervations"] ?></p>
    </div>
<?php
    include_once("templates/footer.php");
?>