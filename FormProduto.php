<?php require_once("Cabecalho.php"); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Adicionar Novo Produto</h3>
    </div>
    <div class="panel-body">
        <form action="ControllerLanchonete.php?op=salvar-produto" method="post">
            <div class="form-group">
                <label for="id">Id</label>
                <input type="hidden" class="form-control" id="id" name="id" placeholder="Id" value="">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço">
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>
            <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <select class="form-control" id="fornecedor" name="fornecedor_id">
                    <?php foreach ($fornecedores as $fornecedor): ?>
                        <option value="<?=$fornecedor->getId();?>"><?=$fornecedor->getNome();?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </div>
</div>



<?php
require_once("Rodape.php");
?>
