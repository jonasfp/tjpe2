<?php
require_once ("conexao.php");

$senha = '123';
$senha_crip = md5($senha);

$query = $pdo->query("SELECT * from usuarios where nivel = 'Administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if ($total_reg == 0) {
    $pdo->query("INSERT INTO usuarios SET nome = 'Jonas Ferreira da Paixão', email = '$email_sistema', matricula = '123456', senha = '$senha', senha_crip = '$senha_crip', nivel = 'Administrador', data = curDate(), ativo = 'Sim'");    
    }

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">	
<title><?php echo $nome_sistema ?></title>
<meta charset="utf-8">
<link
	href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<script
	src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilo-login.css">

<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
	integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ"
	crossorigin="anonymous">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
	integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
	crossorigin="anonymous"></script>

</head>
<body>
	<!------ Include the above in your HEAD tag ---------->
	<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
	<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->

	<div class="container">
		<div class="row vertical-offset-100">
			<div class="col-md-4 col-md-offset-4 form-login" style="opacity: 0.9">
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align: center;">
						<h3 class="panel-title">Digite email e senha</h3>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form" action="autenticar.php"
							method="post">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email"
										type="text">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Senha" name="senha"
										type="password" value="">
								</div>
								<div class="checkbox">
									<label> <input name="remember" type="checkbox"
										value="Remember Me"> Salvar
									</label>
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit"
									value="Entrar">
							</fieldset>
							<p class="recuperar" style="text-align: center; margin-top: 10px ">
								<a href="" data-toggle="modal" data-target="#exampleModal">Recuperar senha</a>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="width: 400px">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Recuperar senha</h5>
				<button id="btn-fechar-rec" type="button" class="close" data-dismiss="modal"
					aria-label="Close" style = "margin-top: -20px">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form method="post" id = "form-recuperar">
				<div class="modal-body"> 	
					<input placeholder="Digite o email cadastrado para recuperar a senha" class="form-control" type="email" name="email" required="required" id="email-recuperar">
				<div id="mensagem-recuperar"></div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Recuperar</button>
				</div>
			</form>
			
		</div>
	</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
	$("#form-recuperar").submit(function () {
	
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "recuperar-senha.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem-recuperar').text('');
				$('#mensagem-recuperar').removeClass()
				if (mensagem.trim() == "Recuperado com Sucesso") {
					//$('#btn-fechar-rec').click();
					$('#email-recuperar').val('');
					$('#mensagem-recuperar').addClass('text-success')
					$('#mensagem-recuperar').text('Sua senha foi enviada para o email')								

				} else {

					$('#mensagem-recuperar').addClass('text-danger')
					$('#mensagem-recuperar').text(mensagem)
				}
			},

			cache: false,
			contentType: false,
			processData: false,

		});
	});
</script>