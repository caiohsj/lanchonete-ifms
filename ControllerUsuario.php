<?php

ControllerUsuario::requisicoes();

class ControllerUsuario
{
    private static $arquivoForm;
    private static $arquivoLista;
    
    public static function requisicoes()
    {
        require_once 'autoload.php';
        self::$arquivoForm = "FormUsuario.php";
        self::$arquivoLista = "";
        if(isset($_GET["op"])) {
            switch ($_GET["op"]) {
                case "form": self::form(); break;
                case "salvar": self::salvar(); break;
                default: self::form(); break;
            }
        }
        else {
            self::form();
        }
    }

    public static function form()
    {
        require_once "FormUsuario.php";
    }

    public static function salvar()
    {
        $usuario = new Usuario();
        $usuario->setNome($_POST["nome"]);
        $usuario->setCpf($_POST["cpf"]);
        $usuario->setTipo($_POST["tipo"]);
        $usuario->setSenha($_POST["senha"]);

        $usuario->salvar($usuario);

        header("location: ControllerUsuario.php");
    }
    
}