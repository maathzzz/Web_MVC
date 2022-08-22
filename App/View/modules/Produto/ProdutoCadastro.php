<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produtos</legend>
            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" />

            <label for="rg">Descrição:</label>
            <input name="descricao" id="descricao" type="text" />

            <label for="rg">Categoria:</label>
            <input name="categoria" id="categoria" type="number" />

            <label for="cpf">Preço venda:</label>
            <input name="preco_venda" id="preco_venda" type="number" />

            <label for="estoque">Estoque:</label>
            <input name="estoque" id="estoque" type="number" />

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>