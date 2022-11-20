<?php 

require_once('../conexao.php');
require_once('verificar.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['matricula'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf_senha'];
$senha_crip = md5($senha);


if($senha != $conf_senha ){

	echo 'As senhas são diferentes!';
	exit();
}

$query = $pdo->query("SELECT * from usuarios where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if ($total_reg > 0 and $id !=$res[0]['id']) {

	echo 'Email já cadastrado';
	exit();
    
}

$query = $pdo->query("SELECT * from usuarios where matricula = '$matricula'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if ($total_reg > 0 and $matricula !=$res[0]['matricula']) {

	echo 'Matricula já cadastrada';
	exit();
    
}

$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, matricula = :matricula, senha = :senha, senha_crip = :senha_crip WHERE id = '$id'");
$query->bindValue(":nome","$nome");
$query->bindValue(":email","$email");
$query->bindValue(":matricula","$matricula");
$query->bindValue(":senha","$senha");
$query->bindValue(":senha_crip","$senha_crip");
$query->execute();

echo 'Editado com sucesso';

 ?>