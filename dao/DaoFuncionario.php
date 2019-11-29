<?php


class DaoFuncionario
{
    private static $conexao;

    function __construct()
    {
        self::$conexao = Conexao::getConexao();
    }

    public function altera(Funcionario $funcionario)
    {
        $sql = "update funcionarios set nome = :nome, cpf = :cpf, senha = :senha"
            ." where id = :id";
        $sqlpreparado = $this->conexao->prepare($sql);
        $sqlpreparado->bindValue(":id",$funcionario->getId());
        $sqlpreparado->bindValue(":nome",$funcionario->getNome());
        $sqlpreparado->bindValue(":cpf",$funcionario->getCpf());
        $sqlpreparado->bindValue(":senha",$funcionario->getSenha());
        $sqlpreparado->execute();
    }

    public function getLogin($dados = array())
    {

        $sql = "select * from funcionarios where cpf = :cpf and senha = :senha";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":cpf",$dados["cpf"]);
        $sqlpreparado->bindValue(":senha",$dados["senha"]);
        $sqlpreparado->setFetchMode(PDO::FETCH_CLASS, "Funcionario");
        $sqlpreparado->execute();
        $funcionario = $sqlpreparado->fetch();//executa sql e salva resultado

        return $funcionario;
    }

    public function getPorId($id)
    {

        $sql = "select * from funcionarios where id = :id";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":id",$id);
        $sqlpreparado->setFetchMode(PDO::FETCH_CLASS, "Funcionario");
        $sqlpreparado->execute();
        $funcionario = $sqlpreparado->fetch();//executa sql e salva resultado

        return $funcionario;
    }

    public function getLista()
    {
        $sql = "select * from funcionarios";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->execute();
        $funcionarios = $sqlpreparado->fetchAll(PDO::FETCH_CLASS, "Funcionario");//executa sql e salva resultado

        return $funcionarios;
    }
}