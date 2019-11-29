<?php


class ControllerFuncionario
{
    private $arquivoLista;
    private $arquivoForm;

    public function __construct()
    {
        $this->arquivoLista = "ListaFuncionarios.php";
        $this->arquivoForm = "";
    }

    public function login($dados)
    {
        $funcionario = Funcionario::login($dados);


        if($funcionario != false){
            $_SESSION["id"] = $funcionario->getId();
            $_SESSION["cpf"] = $funcionario->getCpf();
            $_SESSION["nome"] = $funcionario->getNome();
            $_SESSION["perfil"] = "funcionario";

            return true;
        } else {
            return false;
        }
    }

    public function lista()
    {
        $funcionarios = Funcionario::lista();
        require_once($this->arquivoLista);
    }
}