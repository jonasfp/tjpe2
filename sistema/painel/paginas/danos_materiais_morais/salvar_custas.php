<?php 


require_once('../../../conexao.php');

$tabelacustas = 'custas';

$tipo=$_POST['custas'];
$data=$_POST['custasdata'];
$data_corrigida = "01-".$data;
$bddata_correcao = date('Y-m-d', strtotime($data_corrigida));
$historico=$_POST['custashistorico'];
$valor=$_POST['custasvalor'];
$indicecorrecao=$_POST['indicecorrecaocustas'];
$total=$_POST['custasatualizadas'];


$query = $pdo->prepare("INSERT INTO $tabelacustas SET tipo=:tipo, data=:data, historico = :historico, valor=:valor, indicecorrecao = :indicecorrecao, total = :total");

$query->bindValue(":tipo","$tipo");
$query->bindValue(":data","$bddata_correcao");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor","$valor");
$query->bindValue(":indicecorrecao","$indicecorrecao");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>