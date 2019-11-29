<?php


class DaoPedido
{
    private static $conexao;

    public function __construct()
    {
        self::$conexao = Conexao::getConexao();
    }

    public function salvar(Pedido $pedido)
    {
        if($pedido->getId() == null)
            $this->insere($pedido);

        return self::$conexao->lastInsertId();
    }

    private function insere(Pedido $pedido)
    {
        $sql = "INSERT INTO pedidos(data,funcionario_id,proprietario_id)".
               "VALUES(:data,:funcionario_id,:proprietario_id)";
        $sqlPreparado = self::$conexao->prepare($sql);
        $sqlPreparado->bindValue(":data", $pedido->getData());
        $sqlPreparado->bindValue(":funcionario_id", $pedido->getFuncionario()->getId());
        $sqlPreparado->bindValue(":proprietario_id", $pedido->getProprietario()->getId());
        $sqlPreparado->execute();
    }

    public function getPorId($id)
    {
        $sql = "SELECT * FROM pedidos WHERE id = :id";
        $sqlPreparado = self::$conexao->prepare($sql);
        $sqlPreparado->bindValue(":id", $id);
        $sqlPreparado->setFetchMode(PDO::FETCH_CLASS, "Pedido");
        $sqlPreparado->execute();
        $pedido = $sqlPreparado->fetch();

        return $pedido;
    }

    public function getPorData($data)
    {
        $sql = "SELECT * FROM pedidos WHERE DATE_FORMAT(data, '%Y-%m-%d') = :data";
        $sqlPreparado = self::$conexao->prepare($sql);
        $sqlPreparado->bindValue(":data", $data);
        $sqlPreparado->execute();
        $vetorRegistros = $sqlPreparado->fetchAll();

        foreach ($vetorRegistros as $key => $registro){
            $pedido = Pedido::toObjeto($registro);
            $vetorRegistros[$key] = $pedido;
        }

        return $vetorRegistros;
    }
}