<?php

class Pessoa
{
    public $matricula;
    public $nome;
    public $email;
    public $telefone;
    public $data;

    function inserirBanco()
    {
        $pdo = conexao::get();
        $sql = 'insert into inscricao (matricula, nome, email, telefone, data)
        values (:matricula, :nome, :email, :telefone, :data)';

        $stmt = $pdo->prepare($sql);

        $this->data = date('Y-m-d');
        $stmt->bindValue(':matricula', $this->matricula);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':data', $this->data);
        $stmt->execute();
    }

}