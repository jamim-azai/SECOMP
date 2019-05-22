<?php

function cadastrar($matricula, $nome, $email, $telefone, $atvs)
{
    $pdo = conexao::get();
    $sql = 'select matricula from inscricao 
            where matricula = :matricula';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':matricula', $matricula);
    $stmt->execute();
    if ($stmt->rowCount() > 0){
        return "Já está cadastrado!";
    }

    $obj = new Pessoa();
    $obj->matricula = $matricula;
    $obj->nome = $nome;
    $obj->email = $email;
    $obj->telefone = $telefone;
    $obj->inserirBanco();

    foreach ($atvs as $atividade){
        $obj = new Inscricao_Atividade();
        $obj->id_atividade = $atividade;
        $obj->id_inscricao = $matricula;
        $obj->insereInscricao_Atividade();
    }
    return "";
}


function consultar($matricula)
{
    $pdo = conexao::get();
    $sql = 'select * from inscricao join atv_insc on inscricao.matricula = atv_insc.id_inscricao join atividades on atv_insc.id_atividade = atividades.id where matricula = :matricula';


    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':matricula', $matricula);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $dados = $stmt->fetchAll();

        $inscricao = new Inscricao();
        $inscricao->matricula = $dados[0]['matricula'];
        $inscricao->nome = $dados[0]['nome'];
        $inscricao->telefone = $dados[0]['telefone'];
        $inscricao->email = $dados[0]['email'];
        $inscricao->data = $dados[0]['data'];
        $inscricao->adaptaAtvs($dados);
        return $inscricao;
    }
    else{
        echo "Não cadastrado";
        return false;
    }
}