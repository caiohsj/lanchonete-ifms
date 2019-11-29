<?php

class Upload {
    private $arquivo;
    
    function __construct($arquivo) {
        $this->arquivo = $arquivo;
    }

    function getArquivo() {
        return $this->arquivo;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    public function enviar() {
        //upload do arquivo com data e hora no nome do arquivo
        $arquivo = $this->getArquivo();
        date_default_timezone_set('America/Sao_Paulo'); // definir fuso horario
        $dataEHora = date('dmYHi'); // pegar data e hora do servidor
        $nome_arquivo = "img/" . $dataEHora . $arquivo["name"]; // definir pasta e nome do arquivo no servidor
        $nome_arquivo_tmp = $arquivo["tmp_name"]; // pegar nome do arquivo temporario no servidor
        $msgErroArquivo = ""; // definir msg de erro vazia
        if(move_uploaded_file($nome_arquivo_tmp, $nome_arquivo)==false){ // se ocorrer erro...
            $msgErroArquivo = "Arquivo de foto não pode ser enviado."; // define msg de erro
        }
        //fim upload do arquivo

        return $nome_arquivo;
    }
  
}
