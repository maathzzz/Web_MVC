<?php

spl_autoload_register(function ($classe_buscada) 
{
        /* $arquivo = BASEDIR . '/' . $classe_buscada. '.php';

        if(file_exists($arquivo))
        {
                include $arquivo;
        } else 
        exit ('Arquivo nao encontrado. Arquivo: ' . $arquivo . "<br />");

        $base = dirname(__FILE__); */

        $classe_controller = "Controller/" . $classe_buscada . ".php";
        $classe_model = "Model/" . $classe_buscada . ".php";
        $classe_dao = "DAO/" . $classe_buscada . ".php";

        if (file_exists($classe_controller)){

                include $classe_controller;
        }
        else if (file_exists($classe_model)){

                include $classe_model;

        }
        else if (file_exists($classe_dao)){

                include $classe_dao;

        }             

});

?>
