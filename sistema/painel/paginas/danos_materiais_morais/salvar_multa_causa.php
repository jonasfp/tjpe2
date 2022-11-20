<?php 


require_once('../../../conexao.php');

$tabelamultacausa = 'multa_causa';

$data=$_POST['datadistribuicaocausamulta'];
$data_corrigida = "01-".$data;
$bddata_correcao = date('Y-m-d', strtotime($data_corrigida));
$historico=$_POST['historicocausamulta'];
$valor=$_POST['valorcausamulta'];
$percentual=$_POST['percentualcausamulta'];
$indicecorrecao=$_POST['indicedecorrecaocausamulta'];
$total=$_POST['totalmultacausa'];



$query = $pdo->prepare("INSERT INTO $tabelamultacausa SET data=:data, historico = :historico, valor=:valor, percentual = :percentual, indicecorrecao = :indicecorrecao, total = :total");

$query->bindValue(":data","$bddata_correcao");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor","$valor");
$query->bindValue(":percentual","$percentual");
$query->bindValue(":indicecorrecao","$indicecorrecao");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>