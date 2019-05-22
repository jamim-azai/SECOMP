<?php

class conexao
{
    public static function get()
    {
        try {
            $pdo = new PDO('mysql:host=localhost; dbname=secomp', "root",'');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}