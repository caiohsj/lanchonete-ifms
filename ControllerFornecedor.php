<?php


class ControllerFornecedor
{
    private $arquivoLista;
    private $arquivoForm;

    public function __construct()
    {
        $this->arquivoLista = "ListaFornecedores.php";
        $this->arquivoForm = "FormFornecedor.php";
    }

    public function lista()
    {
        $fornecedores = Fornecedor::lista();
        require_once($this->arquivoLista);
    }

    public function form($fornecedor = null)
    {
        require_once($this->arquivoForm);
    }

    public function salvar($registro)
    {
        Fornecedor::novo(Fornecedor::toObjeto($registro));
        header("location: ControllerLanchonete.php?op=listar-fornecedores");
    }
}