<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Casas</title>
    <link rel="stylesheet" href="view/casas_list.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Casas</h1>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Proprietário</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($casas as $casa) : ?>
                <tr>
                    <td><?php echo $casa['cas_cod']; ?></td>
                    <td><?php echo $casa['cas_descricao']; ?></td>
                    <td><?php echo $casa['cas_endereco']; ?></td>
                    <td><?php echo $casa['cas_cidade']; ?></td>
                    <td><?php echo $casa['cas_proprietario']; ?></td>
                    <td>
                        <a class="action-link" href="index.php?action=edit&cas_cod=<?php echo $casa['cas_cod']; ?>">Editar</a>
                        <a class="action-link" href="index.php?action=delete&cas_cod=<?php echo $casa['cas_cod']; ?>" onclick="return confirm('Tem certeza que deseja excluir esta casa?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a class="add-link" href="index.php?action=create">Adicionar Casa</a>
    </div>
</body>
</html>
