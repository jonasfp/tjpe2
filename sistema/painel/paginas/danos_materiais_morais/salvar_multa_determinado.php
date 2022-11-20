<?php 


require_once('../../../conexao.php');

$tabelamultadeterminado = 'multa_determinado';

$data=$_POST['datadistribuicaovalormulta'];
$data_corrigida = "01-".$data;
$bddata_correcao = date('Y-m-d', strtotime($data_corrigida));
$historico=$_POST['historicovalormulta'];
$valor=$_POST['valordeterminadomulta'];
$indicecorrecao=$_POST['indicedecorrecaovalormulta'];
$total=$_POST['totalmultadeterminado'];

$query = $pdo->prepare("INSERT INTO $tabelamultadeterminado SET data=:data, historico = :historico, valor=:valor, indicecorrecao = :indicecorrecao, total = :total");

$query->bindValue(":data","$bddata_correcao");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor","$valor");
$query->bindValue(":indicecorrecao","$indicecorrecao");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>