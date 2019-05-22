<?php


class Inscricao_Atividade
{
    public $id_atividade;
    public $id_inscricao;

    public function insereInscricao_Atividade(){
        $pdo = conexao::get();

        $sql = 'insert into atv_insc (id_atividade, id_inscricao) values
        (:id_atv, :id_insc)';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_atv', $this->id_atividade);
        $stmt->bindValue(':id_insc', $this->id_inscricao);
        $stmt->execute();

    }

}