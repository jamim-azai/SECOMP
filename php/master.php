<?php

if (!isset($_POST['matricula'])) {
    echo '<script>alert("Acesso não permitido")</script><script>window.location("localhost/secomp2019/index.html")</script>';
} else {
    require_once 'autoload.php';
    require_once 'funcoes.php';

    switch ($_GET['op']) {
        case 1:
            $status = cadastrar($_POST['matricula'], "jamim", $_POST['email'],
                $_POST['telefone'], $_POST['atv']);

            echo '<script>alert(' . '"' . $status . '"' . ')</script>' .
                '<script>window.location=("https://www.youtube.com")</script>';
            break;

        case 2:
            $matricula = $_POST['matricula'];
            $resultado = consultar($matricula);
            break;

    }

}