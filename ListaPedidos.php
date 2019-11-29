<?php require_once("Cabecalho.php"); ?>

    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="ControllerLanchonete.php?op=novo-pedido">Novo Pedido</a>
        </div>
        <div class="col-md-8">
            <!-- form pesquisa -->
            <form action="ControllerLanchonete.php?op=salvar-produto"
                  method="post"
                  class="form-inline text-right">
                <div class="form-group">
                    <label for="descricao">Pesquisa por nome</label>
                    <input type="text" class="form-control"
                           id="pesquisa" name="pesquisa"
                           value="<?=$pesquisa; ?>">
                    <button type="submit" class="btn btn-default">Pesquisar</button>
                </div>
            </form>
            <!-- fim form pesquisa -->
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Listagem de Pedidos (<?php echo count($pedidos); ?>)</h4>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nº do Pedido</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td><a href="ControllerLanchonete.php?op=ver-pedido&pedido=<?=$pedido->getId();?>">Pedido <?=$pedido->getId();?></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

<?php require_once("Rodape.php"); ?>