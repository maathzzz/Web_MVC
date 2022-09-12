<?php

namespace App\Controller;

use App\Model\ProdutoModel;

class ProdutoController extends Controller
{

    public static function index() 
    {
        $model = new ProdutoModel();
        $model->getAllRows();

        include 'View/modules/Produto/ProdutoListar.php';
    }

    public static function form()
    {
        include 'View/modules/Produto/ProdutoCadastro.php';
    }

    public static function save() {

        $produto = new ProdutoModel();
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->categoria = $_POST['categoria'];
        $produto->preco_venda = $_POST['preco_venda'];
        $produto->estoque = $_POST['estoque'];
     

        $produto->save();  

        header("Location: /produto"); 
    }

    public static function delete()
    {

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /produto"); // redirecionando o usuário para outra rota.
    }
}