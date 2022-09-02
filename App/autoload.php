<?php

spl_autoload_register(function ($classe_buscada) 
{

        $arquivo = BASEDIR . '/' . $classe_buscada. '.php';

        //echo $arquivo;

        //echo "<hr />";

        if(file_exists($arquivo))
        {
                include $arquivo;
        } else 
                exit ('Arquivo nao encontrado. Arquivo: ' . $arquivo . "<br />");
                     
});

?>
