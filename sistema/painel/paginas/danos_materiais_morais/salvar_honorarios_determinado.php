<?php 


require_once('../../../conexao.php');

$tabelahonorariosdeterminado = 'honorarios_determinado';

$data=$_POST['datadistribuicaovalor'];
$data_corrigida = "01-".$data;
$bddata_correcao = date('Y-m-d', strtotime($data_corrigida));
$historico=$_POST['historicovalor'];
$valor=$_POST['valordeterminado'];
$indicecorrecao=$_POST['indicedecorrecaohonorariosvalor'];
$total=$_POST['honorariostotaldeterminado'];

$query = $pdo->prepare("INSERT INTO $tabelahonorariosdeterminado SET data=:data, historico = :historico, valor=:valor, indicecorrecao = :indicecorrecao, total = :total");

$query->bindValue(":data","$bddata_correcao");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor","$valor");
$query->bindValue(":indicecorrecao","$indicecorrecao");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>