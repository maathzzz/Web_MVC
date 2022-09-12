<?php

namespace App\DAO;
use \PDO;

abstract class DAO
{
    protected $conexao;

    /**
     * Método construtor, sempre chamado na classe quando a classe é instanciada.
     * Exemplo de instanciar classe (criar objeto da classe):
     * $dao = new PessoaDAO();
     * Neste caso, assim que é instânciado, abre uma conexão com o MySQL (Banco de dados)
     * A conexão é aberta via PDO (PHP Data Object) que é um recurso da linguagem para
     * acesso a diversos SGBDs.
     */

    public function __construct()
    {
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

        $this->conexao = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass']);
    }
}