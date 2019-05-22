<?php
// echo "<pre>";
// var_dump("chegou aqui?");
// echo "</pre>";
// exit();

spl_autoload_register('carregarClasse');

function carregarClasse($nomeArquivo)
{
    if (file_exists('class/' . $nomeArquivo . '.php')) {
        require_once 'class/' . $nomeArquivo . '.php';
    }
}