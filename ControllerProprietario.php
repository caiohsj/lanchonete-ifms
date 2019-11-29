<?php

class ControllerProprietario
{
    
    public function login($dados)
    {

        $proprietario = Proprietario::login($dados);
        
        if($proprietario != false){
            $_SESSION["id"] = $proprietario->getId();
            $_SESSION["cpf"] = $proprietario->getCpf();
            $_SESSION["nome"] = $proprietario->getNome();
            $_SESSION["perfil"] = "proprietario";

            return true;
        } else {
            return false;
        }
    }
    
}