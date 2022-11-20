<?php
@session_start();
require_once("conexao.php");
$email = $_POST['email'];
$senha = $_POST['senha'];
$query = $pdo->query("SELECT * from usuarios where email = '$email' and senha = '$senha'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
//echo $_POST['email'];
//echo $total_reg;
if($total_reg > 0){

	$ativo = $res[0]['ativo'];

	if($ativo=='Sim'){

		$_SESSION['id'] = $res[0]['id'];
		$_SESSION['nivel'] = $res[0]['nivel'];
		$_SESSION['nome'] = $res[0]['nome'];
		

echo "<script> window.location = 'painel' </script>";

	} else{

	echo "<script> window.alert('Usuário não ativo! Contate o administrador')</script>";

	}

}else{
	echo "<script> window.alert('Usuário ou senha incorretos') </script>";
	echo "<script> window.location = 'index.php' </script>";
}

?>