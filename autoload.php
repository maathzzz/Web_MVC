<?php

spl_autoload_register(function ($classe_buscada) 
{

        $base = dirname(__FILE__);

        $arquivo_controller = "$base/Controller/" . $classe_buscada . ".php";
        $arquivo_model = "$base/Model/" . $classe_buscada . ".php";
        $arquivo_dao = "$base/DAO/" . $classe_buscada . ".php";

        if (file_exists($arquivo_controller))
                include $arquivo_controller;
        else if (file_exists($arquivo_model))
                include $arquivo_model;
        else if (file_exists($arquivo_dao))
                include $arquivo_dao;

});
