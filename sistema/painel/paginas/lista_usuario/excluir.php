<?php 

require_once('../../../util/conexao.php');
$tabela = 'usuarios';

$id=$_POST['id'];

$pdo->query("DELETE from $tabela where id = '$id'");
echo 'Excluído com Sucesso';

 ?>