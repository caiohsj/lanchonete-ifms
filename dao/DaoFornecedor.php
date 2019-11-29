<?php


class DaoFornecedor
{
    private static $conexao;

    function __construct()
    {
        self::$conexao = Conexao::getConexao();
    }

    public function salvar(Fornecedor $fornecedor)
    {
        if($fornecedor->getId() == null)
            $this->insere($fornecedor);
    }

    private function insere(Fornecedor $fornecedor)
    {
        $sql = "INSERT INTO fornecedores(nome,telefone) ".
            "VALUES(:nome,:telefone)";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":nome",$fornecedor->getNome());
        $sqlpreparado->bindValue(":telefone",$fornecedor->getTelefone());
        $sqlpreparado->execute();
    }

    public function getLista()
    {
        $sql = "SELECT * FROM fornecedores";
        $sqlPreparado = self::$conexao->prepare($sql);
        $sqlPreparado->execute();
        $vetorRegistros = $sqlPreparado->fetchAll(PDO::FETCH_CLASS, "Fornecedor");

        return $vetorRegistros;
    }

    public function getPorId($id)
    {
        $sql = "SELECT * FROM fornecedores WHERE id = :id";
        $sqlPreparado = self::$conexao->prepare($sql);
        $sqlPreparado->bindValue(":id", $id);
        $sqlPreparado->setFetchMode(PDO::FETCH_CLASS, "Fornecedor");
        $sqlPreparado->execute();
        $fornecedor = $sqlPreparado->fetch();

        return $fornecedor;
    }
}