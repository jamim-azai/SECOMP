<?php


class Inscricao
{
    //dados da pessoa
    public $matricula;
    public $nome;
    public $email;
    public $telefone;
    public $data;

    //dados das atividades
    public $atividades = array();

    public function adaptaAtvs($array){
        foreach ($array as $atv){
            $atividade = new Atividade();
            $atividade->tipo = $atv['tipo'];
            $atividade->descricao = $atv['descricao'];
            $atividade->data_hora = $atv['data_hora'];
            $atividade->local = $atv['local'];
            array_push($this->atividades, $atividade);
        }
}


}