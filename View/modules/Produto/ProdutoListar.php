<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Produtos</title>
</head>
<body>
    <h1>Lista de Produto</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Preço Venda</th>
            <th>No Estoque</th>
        </tr>

        <?php

        // var_dump($model->rows);

        ?>

        <?php foreach($model->rows as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['nome'] ?></td>
                <td><?= $item['descricao'] ?></td>
                <td><?= $item['categoria'] ?></td>
                <td><?= $item['preco_venda'] ?></td>
                <td><?= $item['estoque'] ?></td>
            </tr>
        <?php endforeach ?>

    </table>  
</body>
</html>