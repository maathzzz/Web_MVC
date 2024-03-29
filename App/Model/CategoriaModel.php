<?php

namespace App\Model;

use App\DAO\CategoriaDAO;

class CategoriaModel extends Model
{

    public $id, $nome, $descricao;

    public function save()
    {
        include 'DAO/CategoriaDAO.php';

        $dao = new CategoriaDAO();

        if($this->id == null) 
        {
            
            $dao->insert($this);
        } else {
            // update
        }
    }

    public function getAllRows()
    {
        include 'DAO/CategoriaDAO.php';

        $dao = new CategoriaDAO();

        $this->rows = $dao->getAllRows();
    }

    public function delete(int $id)
    {
        include 'DAO/CategoriaDAO.php'; 

        $dao = new CategoriaDAO();

        $dao->delete($id);
    }

}