<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Casa</title>
    <link rel="stylesheet" href="view/casa_form.css">
</head>

<body>
    <div class="card">
        <h1>Adicionar Casa</h1>
        <form action="index.php?action=store" method="post">
            <label for="cas_descricao">Descrição:</label>
            <input type="text" name="cas_descricao" id="cas_descricao" required>

            <label for="cas_endereco">Endereço:</label>
            <input type="text" name="cas_endereco" id="cas_endereco" required>

            <label for="cas_cidade">Cidade:</label>
            <input type="text" name="cas_cidade" id="cas_cidade" required>

            <label for="cas_proprietario">Proprietário:</label>
            <input type="text" name="cas_proprietario" id="cas_proprietario" required>

            <button type="submit">Adicionar Casa</button>
        </form>
        <br>
        <a href="../progweb-p2/index.php">Voltar para a Lista</a>
    </div>
</body>

</html>