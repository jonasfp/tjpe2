<?php 
/*
require_once('../../../conexao.php');
$tabela = 'calculos_civeis';


$id=$_POST['id'];
$processo=$_POST['processo'];
$vara=$_POST['vara'];
$exequente=$_POST['exequente'];
$executado=$_POST['executado'];
$datafinalcorrecao=$_POST['datafinalcorrecao'];
$bddatafinalcorrecao=date('Y-m-d', strtotime($datafinalcorrecao));
$datainicialjuros=$_POST['datainicialjuros'];
$bddatainicialjuros=date('Y-m-d', strtotime($datainicialjuros));
$datafinaljuros=$_POST['datafinaljuros'];
$bddatafinaljuros=date('Y-m-d', strtotime($datafinaljuros));
$dataevento=$_POST['dataevento'];
$bddataevento=date('Y-m-d', strtotime($dataevento));
$historico=$_POST['historico'];
$valor=$_POST['valor'];
$indicecorrecao=$_POST['indicecorrecao'];
$juros=$_POST['juros'];
$total=$_POST['total'];



$query = $pdo->prepare("INSERT INTO $tabela SET processo = :processo, vara = :vara, exequente = :exequente, executado = :executado, datafinalcorrecao = :datafinalcorrecao, datainicialjuros = :datainicialjuros, datafinaljuros = :datafinaljuros, dataevento = :dataevento, historico = :historico, valor = :valor, indicecorrecao = :indicecorrecao, juros = :juros, total = :total");

$query->bindValue(":processo","$processo");
$query->bindValue(":vara","$vara");
$query->bindValue(":exequente","$exequente");
$query->bindValue(":executado","$executado");
$query->bindValue(":datafinalcorrecao","$bddatafinalcorrecao");
$query->bindValue(":datainicialjuros","$bddatainicialjuros");
$query->bindValue(":datafinaljuros","$bddatafinaljuros");
$query->bindValue(":dataevento","$bddataevento");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor","$valor");
$query->bindValue(":indicecorrecao","$indicecorrecao");
$query->bindValue(":juros","$juros");
$query->bindValue(":total","$total");
$query->execute();

echo 'Salvo com Sucesso';

*/

require_once('../../../conexao.php');

$tabelaparametros = 'parametros_calculos_danos_materiais_morais';
/*$id=$_POST['id'];*/


$indice_correcao_id=$_POST['selectindicecorrecao'];
$datafinal_correcao=$_POST['datafinalcorrecao'];
$datafinal_correcao_corrigida = "01-".$datafinal_correcao;
$bddatafinal_correcao=date('Y-m-d', strtotime($datafinal_correcao_corrigida));
$jurosid=$_POST['selecttipojuros'];
$datainicial_juros=$_POST['datainicialjuros'];
$bddatainicial_juros=date('Y-m-d', strtotime($datainicial_juros));
$datafinal_juros=$_POST['datafinaljuros'];
$bddatafinal_juros=date('Y-m-d', strtotime($datafinal_juros));

$query = $pdo->prepare("INSERT INTO $tabelaparametros SET indice_correcao_id = :indice_correcao_id, datafinal_correcao = :datafinal_correcao, jurosid = :jurosid, datainicial_juros = :datainicial_juros, datafinal_juros = :datafinal_juros");

$query->bindValue(":indice_correcao_id","$indice_correcao_id");
$query->bindValue(":datafinal_correcao","$bddatafinal_correcao");
$query->bindValue(":jurosid","$jurosid");
$query->bindValue(":datainicial_juros","$bddatainicial_juros");
$query->bindValue(":datafinal_juros","$bddatafinal_juros");

$query->execute();


echo 'Salvo com Sucesso';





 ?>
