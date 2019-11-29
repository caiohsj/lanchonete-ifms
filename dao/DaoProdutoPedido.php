<?php


class DaoProdutoPedido
{
    private static $conexao;

    public function __construct()
    {
        self::$conexao = Conexao::getConexao();
    }

    public function insere(ProdutoPedido $produtoPedido)
    {
        $sql = "INSERT INTO produtos_pedidos(produto_id,pedido_id,quantidade,preco_produto,total) ".
            "VALUES(:produto_id,:pedido_id,:quantidade,:preco_produto,:total)";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":produto_id",$produtoPedido->getProduto()->getId());
        $sqlpreparado->bindValue(":pedido_id",$produtoPedido->getPedido()->getId());
        $sqlpreparado->bindValue(":quantidade",$produtoPedido->getQuantidade());
        $sqlpreparado->bindValue(":preco_produto",$produtoPedido->getPreco());
        $sqlpreparado->bindValue(":total",$produtoPedido->getTotal());

        $sqlpreparado->execute();
    }

    public function getListaPorPedido(Pedido $pedido)
    {
        $sql = "SELECT * FROM produtos_pedidos WHERE pedido_id = :pedido_id";
        $sqlPreparado = self::$conexao->prepare($sql);
        $sqlPreparado->bindValue("pedido_id", $pedido->getId());
        $sqlPreparado->execute();
        $vetorRegistros = $sqlPreparado->fetchAll();

        foreach ($vetorRegistros as $key => $registro){
            $produtoPedido = ProdutoPedido::toObjeto($registro);
            $vetorRegistros[$key] = $produtoPedido;
        }

        return $vetorRegistros;
    }
}