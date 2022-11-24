<?php 

require_once('../../../conexao.php');
$tabela = 'modulo_custas_parametros';
$indice_correcao_id=$_POST['selectindicecorrecao'];
$datafinal_correcao=$_POST['datafinalcorrecao'];
$string = $datafinal_correcao;
$pattern = '/(\d*)-(\d*)-(\d*).*/';
$replacement = '$3-$2-01' ;
$bddatafinal_correcao = preg_replace($pattern, $replacement, $string);

$query = $pdo->prepare("INSERT INTO $tabela SET indice_correcao_id =:indice_correcao_id, datafinal_correcao = :datafinal_correcao");

$query->bindValue(":indice_correcao_id","$indice_correcao_id");
$query->bindValue(":datafinal_correcao","$bddatafinal_correcao");

$query->execute();


echo 'Salvo com Sucesso';


 ?>