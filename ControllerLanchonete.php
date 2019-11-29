<?php

/**
 * Descrição do ControllerLanchonete
 * 
 * Controlador padrão da aplicação
 *
 * @author Caio
 */

ControllerLanchonete::requisicoes();

class ControllerLanchonete
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
                case "listar-produtos": self::listarProdutos(); break;
                case "form-produto": self::formProduto(); break;
                case "salvar-produto": self::salvarProduto(); break;
                case "listar-fornecedores": self::listarFornecedores(); break;
                case "form-fornecedor": self::formFornecedor(); break;
                case "salvar-fornecedor": self::salvarFornecedor(); break;
                case "listar-funcionarios": self::listarFuncionarios(); break;
                case "novo-pedido": self::novoPedido(); break;
                case "ver-pedido": self::visualizarPedido($_GET["pedido"]); break;
                case "add-produto-pedido": self::addProdutoPedido(); break;
                case "pedidos-hoje": self::listarPedidosHoje(); break;
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

    public static function formProduto()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerProduto();

        $controller->form();
    }

    public static function formFornecedor()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerFornecedor();

        $controller->form();
    }

    public static function salvarProduto()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerProduto();
        $controller->salvar($_POST);
    }

    public static function salvarFornecedor()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerFornecedor();
        $controller->salvar($_POST);
    }

    public static function listarProdutos()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerProduto();
        $controller->lista();
    }

    public static function listarFornecedores()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerFornecedor();
        $controller->lista();
    }

    public static function listarFuncionarios()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerFuncionario();
        $controller->lista();
    }

    public static function novoPedido()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerPedido();
        $controller->novo();
    }

    public static function visualizarPedido($id)
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerPedido();
        $controller->form($id);
    }

    public static function listarPedidosHoje()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerPedido();
        $controller->pedidosHoje();
    }

    public static function addProdutoPedido()
    {
        session_start();
        //Verificando se tem um usuário logado
        ControllerLanchonete::verificaLogin($_SESSION);
        $controller = new ControllerPedido();
        $controller->addProduto($_POST);
    }

    public static function login()
    {
        session_start();
        $controllerProprietario = new ControllerProprietario();
        $controllerFuncionario = new ControllerFuncionario();
        
        if($controllerProprietario->login($_POST) || $controllerFuncionario->login($_POST)){
            header("location: ControllerLanchonete.php?op=listar-produtos");
        } else {
            $_SESSION["erroLogin"] = "Dados invalidos";
            header("location: ControllerLanchonete.php");
        }
    }

    public static function logout()
    {
        session_start();
        unset($_SESSION["cpf"]);
        unset($_SESSION["nome"]);
        header("location: ControllerLanchonete.php");
    }

    private static function verificaLogin($sessao)
    {
        if(!isset($sessao["cpf"]) || $sessao["cpf"] == "")
            header("location: ControllerLanchonete.php");
    }
    
}
