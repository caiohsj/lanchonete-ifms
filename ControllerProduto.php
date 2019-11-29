<?php


class ControllerProduto
{
    private $arquivoLista;
    private $arquivoForm;

    public function __construct()
    {
        $this->arquivoLista = "ListaProdutos.php";
        $this->arquivoForm = "FormProduto.php";
    }

    public function lista()
    {
        $produtos = Produto::lista();
        require_once($this->arquivoLista);
    }

    public function form($produto = null)
    {
        $fornecedores = Fornecedor::lista();
        require_once($this->arquivoForm);
    }

    public function salvar($registro)
    {
        Produto::novo(Produto::toObjeto($registro));
        header("location: ControllerLanchonete.php?op=listar-produtos");
    }
}