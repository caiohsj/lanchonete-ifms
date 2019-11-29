<?php require_once("Cabecalho.php"); ?>

<?php  
	if(isset($_SESSION["erroLogin"])) : 
?>
	    <div class="bg-danger">   
		    <?=$_SESSION["erroLogin"]; ?>
	    </div>
<?php 
            unset($_SESSION["erroLogin"]);
	endif
?> 


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Acesso ao Sistema</h3>
  </div>
  <div class="panel-body">
  	<form action="ControllerLanchonete.php?op=login" method="post">
  	  <div class="form-group">
  	    <label for="cpf">CPF</label>
  	    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
  	  </div>
  	  <div class="form-group">
  	    <label for="senha">Senha</label>
  	    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
  	  </div>
  	  <button type="submit" class="btn btn-primary">Entrar</button>
  	</form>

  </div>
</div>



<?php
	require_once("Rodape.php");
 ?>	
