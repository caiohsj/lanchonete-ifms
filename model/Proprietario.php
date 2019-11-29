<?php

class Proprietario extends Usuario
{

    static function login($dados)
    {
        $dao = new DaoProprietario();
        $proprietario = $dao->getLogin($dados);

        return $proprietario;
    }


    public static function get($id)
    {
        $dao = new DaoProprietario();
        $proprietario = $dao->getPorId($id);
        return $proprietario;
    }
}