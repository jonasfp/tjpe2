<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

 ?>
   
<h3 class="title1">Relatório de cálculos :</h3>
<div class="form-three widget-shadow">
	<form class="form-horizontal">
		
		
		<div class="form-group">
			<label for="radio" class="col-sm-2 control-label">Escolha uma opção:</label>
			<div class="col-sm-8">
				<div class="radio-inline"><label><input type="radio"> Cíveis</label></div>
				<div class="radio-inline"><label><input type="radio" > Sucessões</label></div>
				<div class="radio-inline"><label><input type="radio" > Família</label></div>
				<div class="radio-inline"><label><input type="radio" > Fazenda</label></div>
				<div class="radio-inline"><label><input type="radio" > Criminal</label></div>
				<div class="radio-inline"><label><input type="radio" > Custas</label></div>
			</div>
		</div>


		<div class="form-group">
			<label for="selector1" class="col-sm-2 control-label">Selecione a vara:</label>
			<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>
				<option>Tribunal de Justiça de Pernambuco</option>                                     
			</select></div>
		</div>

		<div class="form-group">
			<label for="datetimepicker6" class="col-sm-2 control-label">Escolha o período:</label>
			<div class='col-md-2'>
				<div class="form-group">
					<div class='input-group date' id='datetimepicker6'>
						<input type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
			<div class='col-md-2'>
				<div class="form-group">
					<div class='input-group date' id='datetimepicker7'>
						<input type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
			$(function () {
				$('#datetimepicker6').datetimepicker();
				$('#datetimepicker7').datetimepicker({
                           useCurrent: false //Important! See issue #1075
                       });
				$("#datetimepicker6").on("dp.change", function (e) {
					$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
				});
				$("#datetimepicker7").on("dp.change", function (e) {
					$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
				});
			});
		</script>


		<div class="form-group"> <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Pesquisar</button></div>
	</div>
</form>

</div>

