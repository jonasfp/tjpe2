<?php 
session_start();
require_once('../../../util/conexao.php');
$tabela_modulo_custas_totalizacao = 'modulo_custas_totalizacao';
$processo=$_POST['processo'];
$vara=$_POST['vara'];
$total_custas=$_POST['total_custas'];
$total_taxa=$_POST['total_taxa'];
$total_custas_depesas_extras=$_POST['total_custas_depesas_extras'];
$total_custas_taxas_depesas_extras=$_POST['total_custas_taxas_depesas_extras'];
$data_totalizacao = date('Y-m-d');

$query = $pdo->prepare("INSERT INTO $tabela_modulo_custas_totalizacao SET vara = :vara, processo =:processo, total_custas = :total_custas, total_taxa = :total_taxa, total_despesas = :total_despesas, total_totalizacao = :total_totalizacao, data = :data");


$query->bindValue(":vara","$vara");
$query->bindValue(":processo","$processo");
$query->bindValue(":total_custas","$total_custas");
$query->bindValue(":total_taxa","$total_taxa");
$query->bindValue(":total_despesas","$total_custas_depesas_extras");
$query->bindValue(":total_totalizacao","$total_custas_taxas_depesas_extras");
$query->bindValue(":data","$data_totalizacao");


$query->execute();

echo 'Salvo com Sucesso';


 ?>