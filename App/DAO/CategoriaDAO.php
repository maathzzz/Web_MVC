<?php

namespace App\DAO;

use App\Model\CategoriaModel;
use \PDO;

class CategoriaDAO
{
    private $conexao;

    function __construct() 
    {

        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root"; // seu user
        $pass = "etecjau"; // sua senha
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(CategoriaModel $model) 
    {

        $sql = "INSERT INTO categoria
                (nome, descricao) 
                VALUES (?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);

        
        $stmt->execute();      
    }
    
    public function getAllRows()
    {

        $sql = "SELECT * FROM categoria ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); 

        return $stmt->fetchAll();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM categoria WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}