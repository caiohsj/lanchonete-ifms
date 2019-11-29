<?php 

class Conexao {
    private static $host = "localhost";
    private static $usuario = "root";
    private static $senha = "";
    private static $bd = "lanchonete";
    
    public static function getConexao(){
      return new PDO('mysql:host='.self::$host.';dbname='.self::$bd,  self::$usuario,  self::$senha);
    }
    
}

	

?>