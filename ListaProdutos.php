<?php require_once("Cabecalho.php"); ?>

<div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="ControllerLanchonete.php?op=form-produto">Novo Produto</a>
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
                    <h4>Listagem de Produtos</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Descrição</th>
                          <th>Preço</th>
                            <th>Quantidade</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?=$produto->getId();?></td>
                            <td><?=$produto->getDescricao();?></td>
                            <td><?=$produto->getPreco();?></td>
                            <td><?=$produto->getQuantidade();?></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                      
                    </table>
                </div>
            </div>

<?php require_once("Rodape.php"); ?>