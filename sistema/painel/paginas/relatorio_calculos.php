	<?php 

	@session_start();
	require_once('verificar.php');
	require_once('../util/conexao.php');

	?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

	<h3 class="title1">Relatório de cálculos :</h3>
	<div class="form-three widget-shadow">
		<form method="post" class="form-horizontal" id="formRelatorio" name="formRelatorio" >
						
			<div class="form-group">
				<label for="radio" class="col-sm-2 control-label">Escolha uma opção:</label>
				<div class="col-sm-8">
					<div class="radio-inline"><label><input name="radios" id="civeis" type="radio" value="civeis"> Cíveis</label></div>
					<div class="radio-inline"><label><input name="radios" id="sucessoes" type="radio" value="sucessoes" > Sucessões</label></div>
					<div class="radio-inline"><label><input name="radios" id="familia" type="radio" value="familia" > Família</label></div>
					<div class="radio-inline"><label><input name="radios" id="fazenda" type="radio" value="fazenda" > Fazenda</label></div>
					<div class="radio-inline"><label><input name="radios" id="criminal" type="radio" value="criminal" > Criminal</label></div>
					<div class="radio-inline"><label><input name="radios" id="custas" type="radio" value="custas"> Custas</label></div>
				</div>
			</div>

			<div class="form-group">
				<label for="selectComarca" class="col-sm-2 control-label">Selecione a comarca:</label>
				<div class="col-sm-4"><select name="selectComarca" id="selectComarca" class="form-control1">

					<option>Selecione</option>


					<script>

						var comarcas = ["Selecione uma opção","RECIFE","JABOATÃO DOS GURARAPES","CARUARU","OLINDA","..."]
											
						
						$('input[type=radio][name=radios]').on('change', function() {
							switch ($(this).val()) {
								case 'civeis':

								selectComarca.innerHTML=""
								for (let i = 0; i <= 5; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = comarcas[i];
									selectComarca.add(option);
								}
								
								break;
								case 'sucessoes':

								selectComarca.innerHTML=""
								for (let i = 0; i <= 5; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = comarcas[i];
									selectComarca.add(option);
								}

								break;
								case 'familia':

								selectComarca.innerHTML=""
								for (let i = 0; i <= 5; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = comarcas[i];
									selectComarca.add(option);
								}

								break;
								case 'fazenda':

								selectComarca.innerHTML=""
								for (let i = 0; i <= 5; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = comarcas[i];
									selectComarca.add(option);
								}
								break;

								case 'criminal':

								selectComarca.innerHTML=""
								for (let i = 0; i <= 5; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = comarcas[i];
									selectComarca.add(option);
								}

								break;

								case 'custas':

								selectComarca.innerHTML=""
								for (let i = 0; i <= 5; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = comarcas[i];
									selectComarca.add(option);
								}


								break;
							}
						});



					</script>


				</select></div>


			</div>


			<div class="form-group">
				<label for="select" class="col-sm-2 control-label">Selecione a vara:</label>
				<div class="col-sm-4"><select name="select" id="select" class="form-control1">

					<option>Selecione uma opção acima</option>


					<script>

						var civeis = ["Selecione uma opção acima","Listar todos","1ª VARA CÍVEL DA CAPITAL","2ª VARA CÍVEL DA CAPITAL","3ª VARA CÍVEL DA CAPITAL","4ª VARA CÍVEL DA CAPITAL","5ª VARA CÍVEL DA CAPITAL","6ª VARA CÍVEL DA CAPITAL","7ª VARA CÍVEL DA CAPITAL","8ª VARA CÍVEL DA CAPITAL","9ª VARA CÍVEL DA CAPITAL","10ª VARA CÍVEL DA CAPITAL","11ª VARA CÍVEL DA CAPITAL","12ª VARA CÍVEL DA CAPITAL","13ª VARA CÍVEL DA CAPITAL","14ª VARA CÍVEL DA CAPITAL","15ª VARA CÍVEL DA CAPITAL","16ª VARA CÍVEL DA CAPITAL","17ª VARA CÍVEL DA CAPITAL","18ª VARA CÍVEL DA CAPITAL","19ª VARA CÍVEL DA CAPITAL","20ª VARA CÍVEL DA CAPITAL","21ª VARA CÍVEL DA CAPITAL","22ª VARA CÍVEL DA CAPITAL","23ª VARA CÍVEL DA CAPITAL","24ª VARA CÍVEL DA CAPITAL","25ª VARA CÍVEL DA CAPITAL","26ª VARA CÍVEL DA CAPITAL","27ª VARA CÍVEL DA CAPITAL","28ª VARA CÍVEL DA CAPITAL","29ª VARA CÍVEL DA CAPITAL","30ª VARA CÍVEL DA CAPITAL"]

						var sucessoes = ["Selecione uma opção acima","Listar todos","1ª VARA DE SUCESSÕES","2ª VARA DE SUCESSÕES","3ª VARA DE SUCESSÕES","4ª VARA DE SUCESSÕES","5ª VARA DE SUCESSÕES"]

						var familia = ["Selecione uma opção acima","Listar todos","1ª VARA DE FAMÍLIA E REGISTRO CIVIL","2ª VARA DE FAMÍLIA E REGISTRO CIVIL","3ª VARA DE FAMÍLIA E REGISTRO CIVIL","4ª VARA DE FAMÍLIA E REGISTRO CIVIL","5ª VARA DE FAMÍLIA E REGISTRO CIVIL","6ª VARA DE FAMÍLIA E REGISTRO CIVIL","7ª VARA DE FAMÍLIA E REGISTRO CIVIL","8ª VARA DE FAMÍLIA E REGISTRO CIVIL","9ª VARA DE FAMÍLIA E REGISTRO CIVIL","10ª VARA DE FAMÍLIA E REGISTRO CIVIL","11ª VARA DE FAMÍLIA E REGISTRO CIVIL","12ª VARA DE FAMÍLIA E REGISTRO CIVIL","13ª VARA DE FAMÍLIA E REGISTRO CIVIL","14ª VARA DE FAMÍLIA E REGISTRO CIVIL"]

						var fazenda = ["Selecione uma opção acima","Listar todos","1ª VARA DA FAZENDA PÚBLICA","2ª VARA DA FAZENDA PÚBLICA","3ª VARA DA FAZENDA PÚBLICA","4ª VARA DA FAZENDA PÚBLICA","5ª VARA DA FAZENDA PÚBLICA","6ª VARA DA FAZENDA PÚBLICA","7ª VARA DA FAZENDA PÚBLICA","8ª VARA DA FAZENDA PÚBLICA"]

						var criminal = ["Selecione uma opção acima","Listar todos","1ª VARA CRIMINAL","2ª VARA CRIMINAL","3ª VARA CRIMINAL","4ª VARA CRIMINAL","5ª VARA CRIMINAL"]

						var custas = ["Selecione uma opção acima","Listar todos","1ª VARA CÍVEL DA CAPITAL","2ª VARA CÍVEL DA CAPITAL","3ª VARA CÍVEL DA CAPITAL","4ª VARA CÍVEL DA CAPITAL","5ª VARA CÍVEL DA CAPITAL","6ª VARA CÍVEL DA CAPITAL","7ª VARA CÍVEL DA CAPITAL","8ª VARA CÍVEL DA CAPITAL","9ª VARA CÍVEL DA CAPITAL","10ª VARA CÍVEL DA CAPITAL","11ª VARA CÍVEL DA CAPITAL","12ª VARA CÍVEL DA CAPITAL","13ª VARA CÍVEL DA CAPITAL","14ª VARA CÍVEL DA CAPITAL","15ª VARA CÍVEL DA CAPITAL","16ª VARA CÍVEL DA CAPITAL","17ª VARA CÍVEL DA CAPITAL","18ª VARA CÍVEL DA CAPITAL","19ª VARA CÍVEL DA CAPITAL","20ª VARA CÍVEL DA CAPITAL","21ª VARA CÍVEL DA CAPITAL","22ª VARA CÍVEL DA CAPITAL","23ª VARA CÍVEL DA CAPITAL","24ª VARA CÍVEL DA CAPITAL","25ª VARA CÍVEL DA CAPITAL","26ª VARA CÍVEL DA CAPITAL","27ª VARA CÍVEL DA CAPITAL","28ª VARA CÍVEL DA CAPITAL","29ª VARA CÍVEL DA CAPITAL","30ª VARA CÍVEL DA CAPITAL","1ª VARA DE SUCESSÕES","2ª VARA DE SUCESSÕES","3ª VARA DE SUCESSÕES","4ª VARA DE SUCESSÕES","5ª VARA DE SUCESSÕES","1ª VARA DE FAMÍLIA E REGISTRO CIVIL","2ª VARA DE FAMÍLIA E REGISTRO CIVIL","3ª VARA DE FAMÍLIA E REGISTRO CIVIL","4ª VARA DE FAMÍLIA E REGISTRO CIVIL","5ª VARA DE FAMÍLIA E REGISTRO CIVIL","6ª VARA DE FAMÍLIA E REGISTRO CIVIL","7ª VARA DE FAMÍLIA E REGISTRO CIVIL","8ª VARA DE FAMÍLIA E REGISTRO CIVIL","9ª VARA DE FAMÍLIA E REGISTRO CIVIL","10ª VARA DE FAMÍLIA E REGISTRO CIVIL","11ª VARA DE FAMÍLIA E REGISTRO CIVIL","12ª VARA DE FAMÍLIA E REGISTRO CIVIL","13ª VARA DE FAMÍLIA E REGISTRO CIVIL","14ª VARA DE FAMÍLIA E REGISTRO CIVIL","1ª VARA DA FAZENDA PÚBLICA","2ª VARA DA FAZENDA PÚBLICA","3ª VARA DA FAZENDA PÚBLICA","4ª VARA DA FAZENDA PÚBLICA","5ª VARA DA FAZENDA PÚBLICA","6ª VARA DA FAZENDA PÚBLICA","7ª VARA DA FAZENDA PÚBLICA","8ª VARA DA FAZENDA PÚBLICA","1ª VARA CRIMINAL","2ª VARA CRIMINAL","3ª VARA CRIMINAL","4ª VARA CRIMINAL","5ª VARA CRIMINAL"]
						
						
						$('input[type=radio][name=radios]').on('change', function() {
							switch ($(this).val()) {
								case 'civeis':

								select.innerHTML=""
								for (let i = 0; i <= 31; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = civeis[i];
									select.add(option);
								}
								
								break;
								case 'sucessoes':

								select.innerHTML=""
								for (let i = 0; i <= 6; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = sucessoes[i];
									select.add(option);
								}

								break;
								case 'familia':

								select.innerHTML=""
								for (let i = 0; i <= 15; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = familia[i];
									select.add(option);
								}

								break;
								case 'fazenda':

								select.innerHTML=""
								for (let i = 0; i <= 9; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = fazenda[i];
									select.add(option);
								}
								break;

								case 'criminal':

								select.innerHTML=""
								for (let i = 0; i <= 6; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = criminal[i];
									select.add(option);
								}

								break;

								case 'custas':

								select.innerHTML=""
								for (let i = 0; i <= 63; i++) {
									const option = document.createElement("option");
									option.value = i;
									option.text = custas[i];
									select.add(option);
								}


								break;
							}
						});



					</script>


				</select></div>



			</div>


			<div class="form-group"> <label for="processo" class="col-sm-2 control-label">Número do processo:</label> 
				<div class="col-sm-4"> <input type="text" class="form-control" id="processo" name="processo" placeholder="Número do processo"> </div> </div>


				<div class="form-group">
					<label for="datetimepicker6" class="col-sm-2 control-label">Escolha o período:</label>
					<div class='col-md-2'>

						<div class='input-group date' id='datetimepicker6'>
							<input type='text' class="form-control" id="datestart" name="datestart" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>

					</div>
					<div class='col-md-2'>

						<div class='input-group date' id='datetimepicker7'>
							<input type='text' class="form-control" id="dateend" name="dateend" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>

					</div>

				</div>


				<div class="form-group" id="pesquisar" name="pesquisar"> <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Pesquisar</button></div>
			</div>
		</form>

	</div>


	<script type="text/javascript">
		

$("#datestart,#dateend").datepicker({
    changeMonth: true,
    changeYear: true,
    firstDay: 1,           
    dateFormat: 'dd-mm-yy',   
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
})


	</script>


	<script>
   
        jQuery("#processo")
        .mask("9999999-99.9999.9.99.9999")
      
   
		</script>



<script src = "js/ajax_modulo_custas.js"></script>


<div id="relatorio-custas"> </div>

<script>

</script>