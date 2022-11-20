<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

 ?>

<div class=" form-grids row form-grids-right">
	<div class="widget-shadow " data-example-id="basic-forms"> 
		<div class="form-title">
			<h4>Pesquisar por:</h4>
		</div>
		<div class="form-body">
			<form class="form-horizontal"> 
				<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Número do processo:</label> 
					<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" placeholder="Número do processo"> </div> 
				</div> 
				<div class="form-group"> <label class="col-sm-2 control-label">Matricula:</label> 
					<div class="col-sm-9"> <input type="text" class="form-control" id="inputPassword3" placeholder="Matricula"> </div> 
				</div> 
				<div class="form-group"> 
					<div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Pesquisar</button> </div>
				</div>
			</form> 
		</div>
	</div>
</div>

			
