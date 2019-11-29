<?php require_once("Cabecalho.php"); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Adicionar Novo Fornecedor</h3>
    </div>
    <div class="panel-body">
        <form action="ControllerLanchonete.php?op=salvar-fornecedor" method="post">
            <div class="form-group">
                <label for="id">Id</label>
                <input type="number" class="form-control" id="id" name="id" placeholder="Id" value="" disabled>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </div>
</div>



<?php
require_once("Rodape.php");
?>