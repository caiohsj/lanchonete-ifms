<?php


class Produto
{
    private $id;
    private $descricao;
    private $preco;
    private $quantidade;
    private $fornecedor;

    public static function toObjeto($registro)
    {
        if(empty($registro))
            return null;

        $produto = new Produto();
        $produto->setId($registro["id"]);
        $produto->setDescricao($registro["descricao"]);
        $produto->setPreco($registro["preco"]);
        $produto->setQuantidade($registro["quantidade"]);
        $produto->setFornecedor(Fornecedor::get($registro["fornecedor_id"]));
        return $produto;
    }

    public static function lista()
    {
        $dao = new DaoProduto();

        $produtos = $dao->getLista();

        return $produtos;
    }

    public static function novo(Produto $produto)
    {
        $dao = new DaoProduto();

        $dao->salvar($produto);
    }

    public static function atualiza(Produto $produto)
    {
        $dao = new DaoProduto();
        $dao->salvar($produto);
    }

    public static function get($id)
    {
        $dao = new DaoProduto();
        $produto = $dao->getPorId($id);
        return $produto;
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return double
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @return int
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @return mixed
     */
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param String $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @param double $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @param int $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @param mixed $fornecedor
     */
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }
}