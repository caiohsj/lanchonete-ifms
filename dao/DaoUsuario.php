<?php

class DaoUsuario {

    private static $conexao;

    function __construct()
    {
        self::$conexao = Conexao::getConexao();
    }

    public function insere(Usuario $usuario)
    {
        $sql = "insert into usuarios(nome,tipo,cpf,senha) values(:nome,:tipo,:cpf,:senha)";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":nome",$usuario->getNome());
        $sqlpreparado->bindValue(":cpf",$usuario->getCpf());
        $sqlpreparado->bindValue(":tipo",$usuario->getTipo());
        $sqlpreparado->bindValue(":senha",$usuario->getSenha());
        $sqlpreparado->execute();
    }

    public function altera(Usuario $usuario)
    {
        $sql = "update usuarios set nome = :nome, cpf = :cpf, senha = :senha"
                ." where id = :id";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":id",$usuario->getId());
        $sqlpreparado->bindValue(":nome",$usuario->getNome());
        $sqlpreparado->bindValue(":cpf",$usuario->getCpf());
        $sqlpreparado->bindValue(":senha",$usuario->getSenha());
        $sqlpreparado->execute();
    }

    public function getLogin($dados = array())
    {
        
        $sql = "select * from usuarios where cpf = :cpf and senha = :senha";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":cpf",$dados["cpf"]);
        $sqlpreparado->bindValue(":senha",$dados["senha"]);
        $sqlpreparado->setFetchMode(PDO::FETCH_CLASS, "Usuario");
        $sqlpreparado->execute();
        $usuario = $sqlpreparado->fetch();//executa sql e salva resultado
        
        return $usuario;
    }

    public function getPorId($id)
    {

        $sql = "select * from usuarios where id = :id";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":id",$id);
        $sqlpreparado->setFetchMode(PDO::FETCH_CLASS, "usuario");
        $sqlpreparado->execute();
        $usuario = $sqlpreparado->fetch();//executa sql e salva resultado

        return $usuario;
    }

}    

