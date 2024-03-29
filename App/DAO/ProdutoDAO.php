<?php

namespace App\DAO;

use App\Model\ProdutoModel;
use \PDO;

class ProdutoDAO extends DAO
{

    public function __construct() 
    {
        parent::__construct();
    }

    function insert(ProdutoModel $model) 
    {

        $sql = "INSERT INTO produto 
                (nome, descricao, categoria, preco_venda, estoque) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->categoria);
        $stmt->bindValue(4, $model->preco_venda);
        $stmt->bindValue(5, $model->estoque);
        
        $stmt->execute();      
    }
    
    public function getAllRows()
    {

        $sql = "SELECT * FROM produto ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); 

        return $stmt->fetchAll();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}