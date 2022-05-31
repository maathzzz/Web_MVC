<?php

class ProdutoDAO
{
    private $conexao;

    function __construct() 
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root"; // seu user
        $pass = "etecjau"; // sua senha
        
        $this->conexao = new PDO($dsn, $user, $pass);
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