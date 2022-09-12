<?php

namespace App\Model;

use App\DAO\PessoaDAO;

class PessoaModel extends Model
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     */
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco;


    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     */
    public function save()
    {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        // Se id for nulo, significa que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.
        if($this->id == null) 
        {
            // No que estamos enviado o proprio objeto model para o insert, por isso do this
            $dao->insert($this);
        } else {
            // update
        }
    }

    public function getAllRows()
    {
        // incluindo o arquivo PessoaDAO.php
        include 'DAO/PessoaDAO.php';

        // instanciando a classe PessoaDAO
        $dao = new PessoaDAO();

        // Obtendo todos os registros vindos de getAllRows e guardando
        // na propriedade $rows
        $this->rows = $dao->getAllRows();
    }

    public function delete(int $id)
    {
        include 'DAO/PessoaDAO.php'; // Incluíndo o arquivo DAO

        $dao = new PessoaDAO();

        $dao->delete($id);
    }

}