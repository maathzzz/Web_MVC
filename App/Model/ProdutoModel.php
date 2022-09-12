<?php

namespace App\Model;

use App\DAO\ProdutoDAO;

class ProdutoModel extends Model
{

    public $id, $nome, $descricao, $categoria;
    public $preco_venda, $estoque;


    public function save()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        if($this->id == null) 
        {
            
            $dao->insert($this);
        } else {
            // update
        }
    }

    public function getAllRows()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $this->rows = $dao->getAllRows();
    }

    public function delete(int $id)
    {
        include 'DAO/ProdutoDAO.php'; 

        $dao = new ProdutoDAO();

        $dao->delete($id);
    }

}