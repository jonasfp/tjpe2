<?php 
session_start();
require_once('../../../conexao.php');
$tabela = 'modulo_custas_embargos';
$tipo=$_POST['selecttipoembargos'];
$dataevento=$_POST['dataeventoembargos'];
$string = $dataevento;
$pattern = '/(\d*)-(\d*)-(\d*).*/';
$replacement = '$3-$2-01' ;
$bddataevento = preg_replace($pattern, $replacement, $string);
$historico=$_POST['historicoembargos'];
$valor_execucao=$_POST['valorembargos'];
$valor_custas=$_POST['custasprocessuaisembargos'];
$valor_taxas=$_POST['taxajudiciariaembargos'];
$valor_total=$_POST['totalembargos'];
$tipopercentual=$_POST['selectpercentualembargos'];
$id_processo_embargos = $_SESSION['id_processo'];


$query = $pdo->prepare("INSERT INTO $tabela SET tipo =:tipo, dataevento = :dataevento,historico =:historico, valor_execucao = :valor_execucao, tipopercentual =:tipopercentual, valor_custas = :valor_custas, valor_taxas =:valor_taxas, valor_total = :valor_total, id_processo=:id_processo");

$query->bindValue(":tipo","$tipo");
$query->bindValue(":dataevento","$bddataevento");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor_execucao","$valor_execucao");
$query->bindValue(":tipopercentual","$tipopercentual");
$query->bindValue(":valor_custas","$valor_custas");
$query->bindValue(":valor_taxas","$valor_taxas");
$query->bindValue(":valor_total","$valor_total");
$query->bindValue(":id_processo","$id_processo_embargos");

$query->execute();


echo 'Salvo com Sucesso';


 ?>