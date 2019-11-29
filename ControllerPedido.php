<?php


class ControllerPedido
{
    private $arquivoLista;
    private $arquivoForm;

    public function __construct()
    {
        $this->arquivoLista = "ListaPedidos.php";
        $this->arquivoForm = "FormPedido.php";
    }

    public function addProduto($registro)
    {
        $produto = Produto::get($registro["produto_id"]);
        //Insere dentro do vetor o preço do produto
        $registro["preco_produto"] = $produto->getPreco();

        //Insere dentro do vetor o total do produto
        $registro["total"] = $produto->getPreco()*$registro["quantidade"];

        //Adiciona o produto ao pedido
        ProdutoPedido::add(ProdutoPedido::toObjeto($registro));

        //Diminui a quantidade(estoque) do produto
        $novaQuantidade = $produto->getQuantidade()-$registro["quantidade"];
        $produto->setQuantidade($novaQuantidade);
        Produto::atualiza($produto);

        header("location: ControllerLanchonete.php?op=ver-pedido&pedido=".$registro["pedido_id"]);
    }

    public function novo()
    {
        $registro = array(
            "data" => date("Y-m-d H:i:s"),
            "perfil" => $_SESSION["perfil"],
            $_SESSION["perfil"]."_id" => $_SESSION["id"]
        );
        $id = Pedido::novo(Pedido::toObjeto($registro));
        header("location: ControllerLanchonete.php?op=ver-pedido&pedido=".$id);
    }

    public function form($id)
    {
        $produtos = Produto::lista();
        $produtosPedidos = ProdutoPedido::getPorPedido(Pedido::get($id));
        require_once($this->arquivoForm);
    }

    public function pedidosHoje()
    {
        $pedidos = Pedido::listarPorData(date("Y-m-d"));

        require_once($this->arquivoLista);
    }
}