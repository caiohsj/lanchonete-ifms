<?php

class DaoProprietario {

    private static $conexao;

    function __construct()
    {
        self::$conexao = Conexao::getConexao();
    }

    public function altera(Proprietario $proprietario)
    {
        $sql = "update proprietarios set nome = :nome, cpf = :cpf, senha = :senha"
                ." where id = :id";
        $sqlpreparado = $this->conexao->prepare($sql);
        $sqlpreparado->bindValue(":id",$proprietario->getId());
        $sqlpreparado->bindValue(":nome",$proprietario->getNome());
        $sqlpreparado->bindValue(":cpf",$proprietario->getCpf());
        $sqlpreparado->bindValue(":senha",$proprietario->getSenha());
        $sqlpreparado->execute();
    }

    public function getLogin($dados = array())
    {
        
        $sql = "select * from proprietarios where cpf = :cpf and senha = :senha";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":cpf",$dados["cpf"]);
        $sqlpreparado->bindValue(":senha",$dados["senha"]);
        $sqlpreparado->setFetchMode(PDO::FETCH_CLASS, "Proprietario");
        $sqlpreparado->execute();
        $proprietario = $sqlpreparado->fetch();//executa sql e salva resultado
        
        return $proprietario;
    }

    public function getPorId($id)
    {

        $sql = "select * from proprietarios where id = :id";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":id",$id);
        $sqlpreparado->setFetchMode(PDO::FETCH_CLASS, "Proprietario");
        $sqlpreparado->execute();
        $proprietario = $sqlpreparado->fetch();//executa sql e salva resultado

        return $proprietario;
    }

}    

