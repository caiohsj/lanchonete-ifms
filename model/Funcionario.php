<?php

class Funcionario extends Usuario
{

    public static function login($dados)
    {
        $dao = new DaoFuncionario();
        $funcionario = $dao->getLogin($dados);

        return $funcionario;
    }

    public static function lista()
    {
        $dao = new DaoFuncionario();
        $funcionarios = $dao->getLista();

        return $funcionarios;
    }

    public static function get($id)
    {
        $dao = new DaoFuncionario();
        $funcionario = $dao->getPorId($id);
        return $funcionario;
    }
}