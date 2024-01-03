<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Casa</title>
    <link rel="stylesheet" href="view/casa_edit_form.css">
</head>
<body>
<div class="container">
        <h1>Editar Casa</h1>
        <form action="index.php?action=update" method="post">
            <input type="hidden" name="cas_cod" value="<?php echo $casa['cas_cod']; ?>">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $casa['cas_descricao']; ?>" required>
            <br>
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" value="<?php echo $casa['cas_endereco']; ?>" required>
            <br>
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" value="<?php echo $casa['cas_cidade']; ?>" required>
            <br>
            <label for="proprietario">Proprietário:</label>
            <input type="text" name="proprietario" value="<?php echo $casa['cas_proprietario']; ?>" required>
            <br>
            <button type="submit">Atualizar Casa</button>
        </form>
        <br>
        <a href="../progweb-p2/index.php">Voltar para a Lista</a>
    </div>
</body>
</html>
