<?php
    session_start();

    if(isset($_SESSION["cpf"]))
        header("location: ControllerLanchonete.php?op=listar-produtos");
    else
        header("location: ControllerLanchonete.php");
?>