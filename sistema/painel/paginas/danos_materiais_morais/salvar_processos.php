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
$tabelaprocesso = 'processo';

/*$id=$_POST['id'];*/

$processo=$_POST['processo'];
$varaid=$_POST['vara'];
$exequente=$_POST['exequente'];
$executado=$_POST['executado'];

$query = $pdo->prepare("INSERT INTO $tabelaprocesso SET processo = :processo, varaid = :varaid, exequente = :exequente, executado = :executado");

$query->bindValue(":processo","$processo");
$query->bindValue(":varaid","$varaid");
$query->bindValue(":exequente","$exequente");
$query->bindValue(":executado","$executado");

$query->execute();



echo 'Salvo com Sucesso';





 ?>
