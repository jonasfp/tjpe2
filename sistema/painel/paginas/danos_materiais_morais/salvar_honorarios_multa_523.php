<?php 


require_once('../../../conexao.php');

$tabelahonorariosmultaart523 = 'honorarios_multa';

$historico=$_POST['historicoart523'];
$percentual=$_POST['percentualart523'];
$total=$_POST['totalart523'];

$query = $pdo->prepare("INSERT INTO $tabelahonorariosmultaart523 SET historico = :historico, percentual = :percentual, total = :total");

$query->bindValue(":historico","$historico");
$query->bindValue(":percentual","$percentual");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>