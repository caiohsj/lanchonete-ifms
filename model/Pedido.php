<?php


class Pedido
{
    private $id;
    private $data;
    private $funcionario;
    private $proprietario;

    public static function novo(Pedido $pedido)
    {
        $dao = new DaoPedido();
        return $dao->salvar($pedido);
    }

    public static function toObjeto($registro)
    {
        if(empty($registro))
            return null;

        $pedido = new Pedido();
        if(isset($registro["id"]))
            $pedido->setId($registro["id"]);

        $pedido->setData($registro["data"]);

        if((isset($registro["perfil"]) && $registro["perfil"] == "funcionario") || isset($registro["funcionario_id"]))
            $pedido->setFuncionario(Funcionario::get($registro["funcionario_id"]));
        else
            $pedido->setFuncionario(new Funcionario());


        if((isset($registro["perfil"]) && $registro["perfil"] == "proprietario") || isset($registro["proprietario_id"]))
            $pedido->setProprietario(Proprietario::get($registro["proprietario_id"]));
        else
            $pedido->setProprietario(new Proprietario());

        return $pedido;
    }

    public static function get($id)
    {
        $dao = new DaoPedido();
        $pedido = $dao->getPorId($id);
        return $pedido;
    }

    public static function listarPorData($data)
    {
        $dao = new DaoPedido();
        return $dao->getPorData($data);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getFuncionario()
    {
        return $this->funcionario;
    }

    /**
     * @return mixed
     */
    public function getProprietario()
    {
        return $this->proprietario;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param mixed $funcionario
     */
    public function setFuncionario($funcionario)
    {
        $this->funcionario = $funcionario;
    }

    /**
     * @param mixed $proprietario
     */
    public function setProprietario($proprietario)
    {
        $this->proprietario = $proprietario;
    }
}