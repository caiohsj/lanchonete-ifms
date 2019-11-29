<?php


class ProdutoPedido
{
    private $pedido;
    private $produto;
    private $quantidade;
    private $preco;
    private $total;

    public static function toObjeto($registro)
    {
        $produtoPedido = new ProdutoPedido();
        $produtoPedido->setPedido(Pedido::get($registro["pedido_id"]));
        $produtoPedido->setProduto(Produto::get($registro["produto_id"]));
        $produtoPedido->setQuantidade($registro["quantidade"]);
        $produtoPedido->setPreco($registro["preco_produto"]);
        $produtoPedido->setTotal($registro["total"]);
        return $produtoPedido;
    }

    public static function add(ProdutoPedido $produtoPedido)
    {
        $dao = new DaoProdutoPedido();
        $dao->insere($produtoPedido);
    }

    public static function getPorPedido(Pedido $pedido)
    {
        $dao = new DaoProdutoPedido();
        return $dao->getListaPorPedido($pedido);
    }

    /**
     * @return mixed
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * @return mixed
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $pedido
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * @param mixed $produto
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }
}