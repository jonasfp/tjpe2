<?php 

require_once('../../../conexao.php');
$tabela = 'usuarios';


$id=$_POST['id'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$matricula=$_POST['matricula'];
$nivel=$_POST['nivel'];



$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, email = :email, matricula = :matricula, nivel = :nivel");

$query->bindValue(":nome","$nome");
$query->bindValue(":email","$email");
$query->bindValue(":matricula","$matricula");
$query->bindValue(":nivel","$nivel");
$query->execute();

echo 'Salvo com Sucesso';

 ?>