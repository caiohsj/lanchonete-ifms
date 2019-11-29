<?php require_once("Cabecalho.php"); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Pedido <?=$id;?></h3>
    </div>
    <div class="panel-body">
        <form action="ControllerLanchonete.php?op=add-produto-pedido" method="post">
            <input type="hidden" name="pedido_id" value="<?=$id;?>">
            <div class="form-group">
                <label for="produto">Produto</label>
                <select class="form-control" id="produto" name="produto_id">
                    <?php foreach ($produtos as $produto): ?>
                        <option value="<?=$produto->getId();?>">
                            <?=$produto->getDescricao();?> - R$ <?=$produto->getPreco();?> - Quantidade: <?=$produto->getQuantidade();?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input class="form-control" type="number" id="quantidade" name="quantidade" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($produtosPedidos as $produtoPedido): ?>
                <tr>
                    <td><?=$produtoPedido->getProduto()->getId();?></td>
                    <td><?=$produtoPedido->getProduto()->getDescricao();?></td>
                    <td><?=$produtoPedido->getPreco();?></td>
                    <td><?=$produtoPedido->getQuantidade();?></td>
                    <td><?=$produtoPedido->getTotal();?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>

    </div>
</div>



<?php
require_once("Rodape.php");
?>