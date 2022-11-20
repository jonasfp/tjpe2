<?php 
require_once ("conexao.php");

$email = $_POST['email'];

$query = $pdo->query("SELECT * from usuarios where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if ($total_reg > 0) {
    $senha = $res[0]['senha'];
    $destinatario = $nome_sistema. ' - Recuperação de senha';
    $mensagem = 'Sua senha é:'.$senha;
    $cabecalhos = 'De:'.$email_sistema;
    @mail($destinatario, $mensagem, $cabecalhos);
    echo 'Recuperada com sucesso!';
} else{
	echo "Esse email não está cadastrado!";
}

 ?>