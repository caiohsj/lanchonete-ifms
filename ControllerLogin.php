<?php

/**
 * Descrição do ControllerLanchonete
 * 
 * Controlador padrão da aplicação
 *
 * @author Caio 
 */

ControllerLogin::requisicoes();

class ControllerLogin
{
    private static $arquivoForm;
    private static $arquivoLista;
    
    public static function requisicoes()
    {
        require_once 'autoload.php';
        self::$arquivoForm = "FormLogin.php";
        self::$arquivoLista = "";
        if(isset($_GET["op"])) {
            switch ($_GET["op"]) {
                case "login": self::login(); break;
                case "form": self::form(); break;
                case "logout": self::logout(); break;
                default: self::form(); break;
            }
        }
        else {
            self::form();
        }
    }
    
    public static function form()
    {
        require_once self::$arquivoForm;
    }

    public static function login()
    {
        session_start();

        $usuario = Usuario::login($_POST);
        
        if($usuario != false){
            $_SESSION["id"] = $usuario->getId();
            $_SESSION["cpf"] = $usuario->getCpf();
            $_SESSION["nome"] = $usuario->getNome();
            $_SESSION["tipo"] = $usuario->getTipo();

            header("location: ControllerUsuario.php?op=form");
        } else {
            $_SESSION["erroLogin"] = "Dados invalidos";
            header("location: ControllerLogin.php");
        }
    }

    public static function logout()
    {
        session_start();
        unset($_SESSION["id"]);
        unset($_SESSION["cpf"]);
        unset($_SESSION["nome"]);
        unset($_SESSION["tipo"]);
        header("location: ControllerLogin.php");
    }

    private static function verificaLogin($sessao)
    {
        if(!isset($sessao["cpf"]) || $sessao["cpf"] == "")
            header("location: ControllerLogin.php");
    }
    
}
