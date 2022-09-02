<?php

namespace App\Controller;

use App\Model\CategoriaModel;


class CategoriaController 
{

    public static function index() 
    {
        $model = new CategoriaModel();
        $model->getAllRows();

        include VIEWS . '/Categoria/ListaCategoria.php';
    }

    public static function form()
    {
        include VIEWS . '/Categoria/CategoriaCadastro.php';
    }

    public static function save() 
    {

        $categoria = new CategoriaModel();
        $categoria->nome = $_POST['nome'];
        $categoria->descricao = $_POST['descricao'];    

        $categoria->save();  

        header("Location: /categoria"); 
    }

    public static function delete()
    {

        $categoria = new CategoriaModel;
        $categoria->delete((int) $_GET['id'] );

        header("Location: /categoria");
    }
}