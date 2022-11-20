<?php 


require_once('../../../conexao.php');

$tabelahonorarioscausa = 'honorarios_causa';

$data=$_POST['datadistribuicaocausa'];
$data_corrigida = "01-".$data;
$bddata_correcao = date('Y-m-d', strtotime($data_corrigida));
$historico=$_POST['historicocausa'];
$valor=$_POST['valorcausa'];
$percentual=$_POST['percentualcausa'];
$indicecorrecao=$_POST['indicedecorrecaohonorarioscausa'];
$total=$_POST['honorariostotalcausa'];



$query = $pdo->prepare("INSERT INTO $tabelahonorarioscausa SET data=:data, historico = :historico, valor=:valor, percentual = :percentual, indicecorrecao = :indicecorrecao, total = :total");

$query->bindValue(":data","$bddata_correcao");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor","$valor");
$query->bindValue(":percentual","$percentual");
$query->bindValue(":indicecorrecao","$indicecorrecao");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>