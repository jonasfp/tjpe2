<?php 

require_once('../../../util/conexao.php');

$tabelaexcluir = $_POST['tabela'];

$id=$_POST['id'];

$pdo->query("DELETE from $tabelaexcluir where id = '$id'");
echo 'Excluído com Sucesso';

 ?>