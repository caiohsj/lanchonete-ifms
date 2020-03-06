<?php require_once("Cabecalho.php"); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Adicionar Novo Usuário</h3>
    </div>
    <div class="panel-body">
        <form action="ControllerUsuario.php?op=salvar" method="post">
            <div class="form-group">
                <label for="id">Id</label>
                <input type="number" class="form-control" id="id" name="id" placeholder="Id" value="" disabled>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="text" class="form-control" id="senha" name="senha" placeholder="Senha">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <select name="tipo" class="form-control">
                    <option value="medico">Medico</option>
                    <option value="proprietario">Proprietario</option>
                    <option value="secretario">Secretario</option>
                    <option value="paciente">Paciente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </div>
</div>



<?php
require_once("Rodape.php");
?>