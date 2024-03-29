<?php

namespace App\DAO;

use App\Model\PessoaModel;
use \PDO;

/**
 * As classes DAO (Data Access Object) são responsáveis por executar os
 * SQL junto ao banco de dados.
 */
class PessoaDAO extends DAO
{

    function __construct() 
    {
        // Chamando a classe construct, comum à todas as classes do tipo DAO (conexão com o banco de dados)
        parent::__construct();

    }


    /**
     * Método que recebe um model e extrai os dados do model para realizar o insert
     * na tabela correspondente ao model. Note o tipo do parâmetro declarado.
     */
    function insert(PessoaModel $model) 
    {
        // Trecho de código SQL com marcadores ? para substituição posterior, no prepare   
        $sql = "INSERT INTO pessoa
                (nome, rg, cpf, data_nascimento, email, telefone, endereco) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Declaração da variável stmt que conterá a montagem da consulta. Observe que
        // estamos acessando o método prepare dentro da propriedade que guarda a conexão
        // com o MySQL, via operador seta "->". Isso significa que o prepare "está dentro"
        // da propriedade $conexao e recebe nossa string sql com os devidor marcadores.
        $stmt = $this->conexao->prepare($sql);

        // Nesta etapa os bindValue são responsáveis por receber um valor e trocar em uma 
        // determinada posição, ou seja, o valor que está em 3, será trocado pelo terceiro ?
        // No que o bindValue está recebendo o model que veio via parâmetro e acessamos
        // via seta qual dado do model queremos pegar para a posição em questão.
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->email);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);
        
        // Ao fim, onde todo SQL está montando, executamos a consulta.
        $stmt->execute();      
    }
    
    public function getAllRows()
    {
        // Instrução SQL a ser consultada no banco de dados.
        $sql = "SELECT id, nome, cpf FROM pessoa ";

        // Preparando o SQL para se executado.
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // Executando a SQL preparada.

        // Retornando todas as linhas obtidas na consulta.
        // É retonado um array associativo, uma estrutura 
        // chave-valor, por exemplo:
        // array(
        //        array('id' => 1, 'nome' => 'Rapha'), 
        //        array('id' => 3, 'nome' => 'Portugal') 
        //      )
        return $stmt->fetchAll();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}