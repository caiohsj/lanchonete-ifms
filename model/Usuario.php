<?php

class Usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $tipo;
    private $senha;

    static function login($dados)
    {
        $dao = new DaoUsuario();
        $usuario = $dao->getLogin($dados);

        return $usuario;
    }

    static function salvar($usuario)
    {
        $dao = new DaoUsuario();
        
        if($usuario->getId() != null) {
            $usuario = $dao->altera($usuario);
        } else {
            $usuario = $dao->insere($usuario);
        }

        return $usuario;
    }


    public static function get($id)
    {
        $dao = new DaoUsuario();
        $usuario = $dao->getPorId($id);
        return $usuario;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

}