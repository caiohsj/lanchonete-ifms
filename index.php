<?php
    session_start();

    if(isset($_SESSION["cpf"]))
        //header("location: ControllerLanchonete.php?op=listar-produtos");
        echo "logado";
    else
        header("location: ControllerLogin.php");
?>