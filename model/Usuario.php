<?php

class Usuario {
    protected $id;
    protected $nome;
    protected $cpf;
    protected $senha;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCpf() {
        return $this->cpf;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

  
}
