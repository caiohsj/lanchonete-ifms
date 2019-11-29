<?php


class Fornecedor
{
    private $id;
    private $nome;
    private $telefone;

    public static function toObjeto($registro)
    {
        if(empty($registro))
            return null;

        $fornecedor = new Fornecedor();
        $fornecedor->setId($registro["id"]);
        $fornecedor->setNome($registro["nome"]);
        $fornecedor->setTelefone($registro["telefone"]);
        return $fornecedor;
    }

    public static function novo(Fornecedor $fornecedor)
    {
        $dao = new DaoFornecedor();

        $dao->salvar($fornecedor);
    }

    public static function get($id)
    {
        $dao = new DaoFornecedor();
        $funcionario = $dao->getPorId($id);
        return $funcionario;
    }

    public static function lista()
    {
        $dao = new DaoFornecedor();

        $funcionarios = $dao->getLista();

        return $funcionarios;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return String
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param String $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param String $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
}