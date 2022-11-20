<?php 


require_once('../../../conexao.php');

$tabelamultacondenacao = 'multa_condenacao';



$historico=$_POST['historicocondenacaomulta'];
$percentual=$_POST['percentualcondenacaomulta'];
$total=$_POST['totalmultacondenacao'];

$query = $pdo->prepare("INSERT INTO $tabelamultacondenacao SET historico = :historico, percentual = :percentual, total = :total");

$query->bindValue(":historico","$historico");
$query->bindValue(":percentual","$percentual");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>