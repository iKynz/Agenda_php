<?php
    include_once("config/url.php");
    include_once("templates/header.php");
?>
    <div class="container">
        <h1 id="main-title">Editar Contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact["id"] ?>">
            <div class="form-group">
                <label for="nome">Nome do contato</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?= $contact["nome"] ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do contato</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" value="<?= $contact["phone"] ?>" required>
            </div>
            <div class="form-group">
                <label for="obervations">Observações</label>
                <textarea type="text" 
                class="form-control" 
                id="obervations" 
                name="obervations" 
                placeholder="Observações" 
                rows="3"
                required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
        <?php include_once("./templates/backbtn.php") ?>
    </div>
<?php
    include_once("templates/footer.php");
?>