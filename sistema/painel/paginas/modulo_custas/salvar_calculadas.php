<?php 
session_start();
require_once('../../../util/conexao.php');
$tabela = 'modulo_custas_calculadas';
$tipo=$_POST['selecttipocustas'];
$dataevento=$_POST['dataeventocustascalculadas'];
$string = $dataevento;
$pattern = '/(\d*)-(\d*)-(\d*).*/';
$replacement = '$3-$2-01' ;
$bddataevento = preg_replace($pattern, $replacement, $string);
$historico=$_POST['historicocustascalculadas'];
$valor_custas=$_POST['custasprocessuaiscalculadas'];
$valor_taxa=$_POST['taxajudiciariacalculada'];
$valor_custas_atualizadas=$_POST['custasprocessuaisatualizadas'];
$valor_taxa_atualizada=$_POST['taxajudiciariaatualizada'];
$total_custas_taxa=$_POST['totalcustascalculadasatualizadas'];
$id_processo_calculadas = $_SESSION['id_processo'];

if($tipo == "Pagas"){

$valor_custas = $valor_custas * (-1);
$valor_taxa = $valor_taxa * (-1);
$valor_custas_atualizadas = $valor_custas_atualizadas * (-1);
$valor_taxa_atualizada = $valor_taxa_atualizada * (-1); 
$total_custas_taxa = $total_custas_taxa * (-1);
    
} else {

$valor_custas = $valor_custas;
$valor_taxa = $valor_taxa;
$valor_custas_atualizadas = $valor_custas_atualizadas;
$valor_taxa_atualizada = $valor_taxa_atualizada; 
$total_custas_taxa = $total_custas_taxa;

}

$query = $pdo->prepare("INSERT INTO $tabela SET tipo =:tipo, dataevento = :dataevento,historico =:historico, valor_custas = :valor_custas, valor_taxa =:valor_taxa, valor_custas_atualizadas = :valor_custas_atualizadas, valor_taxa_atualizada =:valor_taxa_atualizada, total_custas_taxa = :total_custas_taxa,id_processo=:id_processo");

$query->bindValue(":tipo","$tipo");
$query->bindValue(":dataevento","$bddataevento");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor_custas","$valor_custas");
$query->bindValue(":valor_taxa","$valor_taxa");
$query->bindValue(":valor_custas_atualizadas","$valor_custas_atualizadas");
$query->bindValue(":valor_taxa_atualizada","$valor_taxa_atualizada");
$query->bindValue(":total_custas_taxa","$total_custas_taxa");
$query->bindValue(":id_processo","$id_processo_calculadas");

$query->execute();


echo 'Salvo com Sucesso';


 ?>