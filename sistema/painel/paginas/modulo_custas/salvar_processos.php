<?php 

require_once('../../../conexao.php');
$tabela_modulo_custas_processo = 'modulo_custas_processo';
$processo=$_POST['processo'];
$varaid=$_POST['vara'];
$devedores=$_POST['devedores'];

$query = $pdo->prepare("INSERT INTO $tabela_modulo_custas_processo SET processo =:processo, varaid = :varaid, devedores = :devedores");


$query->bindValue(":processo","$processo");
$query->bindValue(":varaid","$varaid");
$query->bindValue(":devedores","$devedores");


$query->execute();


echo 'Salvo com Sucesso';


 ?>
