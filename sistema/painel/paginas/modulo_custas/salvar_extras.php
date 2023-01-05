<?php 
session_start();
require_once('../../../util/conexao.php');
$tabela = 'modulo_custas_extras';
$tipo=$_POST['selectcustasdespesasextras'];
$dataevento=$_POST['dataeventoextras'];
$string = $dataevento;
$pattern = '/(\d*)-(\d*)-(\d*).*/';
$replacement = '$3-$2-01' ;
$bddataevento = preg_replace($pattern, $replacement, $string);
$historico=$_POST['historicoextras'];
$quantidade=$_POST['quantidadeextras'];
$valor_unitario=$_POST['valorextras'];
$total_extras=$_POST['totalextras'];
$id_processo_extras = $_SESSION['id_processo'];

$query = $pdo->prepare("INSERT INTO $tabela SET tipo =:tipo, dataevento = :dataevento,historico =:historico, quantidade = :quantidade, valor_unitario =:valor_unitario, total_extras = :total_extras,id_processo=:id_processo");

$query->bindValue(":tipo","$tipo");
$query->bindValue(":dataevento","$bddataevento");
$query->bindValue(":historico","$historico");
$query->bindValue(":quantidade","$quantidade");
$query->bindValue(":valor_unitario","$valor_unitario");
$query->bindValue(":total_extras","$total_extras");
$query->bindValue(":id_processo","$id_processo_extras");

$query->execute();


echo 'Salvo com Sucesso';


 ?>