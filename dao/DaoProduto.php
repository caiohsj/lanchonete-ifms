<?php


class DaoProduto
{
    private static $conexao;

    public function __construct()
    {
        self::$conexao = Conexao::getConexao();
    }

    public function salvar(Produto $produto)
    {
        if($produto->getId() == null)
            $this->insere($produto);
        else
            $this->altera($produto);
    }

    private function insere(Produto $produto)
    {
        $sql = "INSERT INTO produtos(descricao,preco,quantidade,fornecedor_id) ".
               "VALUES(:descricao,:preco,:quantidade,:fornecedor_id)";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":descricao",$produto->getDescricao());
        $sqlpreparado->bindValue(":preco",$produto->getPreco());
        $sqlpreparado->bindValue(":quantidade",$produto->getQuantidade());
        $sqlpreparado->bindValue(":fornecedor_id", $produto->getFornecedor()->getId());

        $sqlpreparado->execute();
    }

    private function altera(Produto $produto)
    {
        $sql = "UPDATE produtos SET descricao = :descricao, preco = :preco, quantidade = :quantidade ".
            "WHERE id = :id";
        $sqlpreparado = self::$conexao->prepare($sql);
        $sqlpreparado->bindValue(":id",$produto->getId());
        $sqlpreparado->bindValue(":descricao",$produto->getDescricao());
        $sqlpreparado->bindValue(":preco",$produto->getPreco());
        $sqlpreparado->bindValue(":quantidade",$produto->getQuantidade());

        $sqlpreparado->execute();
    }

    public function getLista()
    {
        $sql = "SELECT * FROM produtos";
        $sqlPreparado = self::$conexao->prepare($sql);
        $sqlPreparado->execute();
        $vetorRegistros = $sqlPreparado->fetchAll();

        foreach ($vetorRegistros as $key => $produto){
            $produto = Produto::toObjeto($produto);
            $vetorRegistros[$key] = $produto;
        }

        return $vetorRegistros;
    }

    public function getPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $sqlPreparado = self::$conexao->prepare($sql);
        $sqlPreparado->bindValue(":id", $id);
        $sqlPreparado->execute();
        $vetorRegistro = $sqlPreparado->fetch();
        //Converte para o objeto do tipo Produto
        $produto = Produto::toObjeto($vetorRegistro);

        return $produto;
    }

}