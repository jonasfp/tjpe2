<?php 

require_once('../../../conexao.php');
$tabela = 'modulo_custas_custas_taxa';
$tipo=$_POST['selectcustastaxa'];
$dataevento=$_POST['dataeventocustastaxa'];
$string = $dataevento;
$pattern = '/(\d*)-(\d*)-(\d*).*/';
$replacement = '$3-$2-01' ;
$bddataevento = preg_replace($pattern, $replacement, $string);
$historico=$_POST['historicocustastaxa'];
$valor_causa=$_POST['valorcustastaxa'];
$valor_custas=$_POST['custasprocessuaiscustastaxa'];
$valor_taxa=$_POST['taxajudiciariacustastaxa'];
$total_custas_taxa=$_POST['totalcustastaxa'];

$query = $pdo->prepare("INSERT INTO $tabela SET tipo =:tipo, dataevento = :dataevento,historico =:historico, valor_causa = :valor_causa, valor_custas =:valor_custas, valor_taxa = :valor_taxa, total_custas_taxa =:total_custas_taxa");

$query->bindValue(":tipo","$tipo");
$query->bindValue(":dataevento","$bddataevento");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor_causa","$valor_causa");
$query->bindValue(":valor_custas","$valor_custas");
$query->bindValue(":valor_taxa","$valor_taxa");
$query->bindValue(":total_custas_taxa","$total_custas_taxa");

$query->execute();


echo 'Salvo com Sucesso';


 ?>