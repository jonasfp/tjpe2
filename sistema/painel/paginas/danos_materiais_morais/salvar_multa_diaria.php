<?php 


require_once('../../../conexao.php');

$tabelamultadiaria = 'multa_diaria';

$data_inicial=$_POST['datainiciomultadiaria'];
$data_corrigida_inicial = "01-".$data_inicial;
$bddata_correcao_inicial = date('Y-m-d', strtotime($data_corrigida_inicial));
$data_final=$_POST['datafinalmultadiaria'];
$data_corrigida_final = "01-".$data_final;
$bddata_correcao_final = date('Y-m-d', strtotime($data_corrigida_final));
$numerosdias = $_POST['numerosdias']; 
$historico=$_POST['historicomultadiaria'];
$valor=$_POST['valormultadiaria'];
$valor_limite=$_POST['valormultalimite'];
$total=$_POST['totalmultadiaria'];



$query = $pdo->prepare("INSERT INTO $tabelamultadiaria SET data_inicial=:data_inicial, data_final=:data_final, numerosdias=:numerosdias, historico = :historico, valor=:valor, valor_limite = :valor_limite, total = :total");

$query->bindValue(":data_inicial","$bddata_correcao_inicial");
$query->bindValue(":data_final","$bddata_correcao_final");
$query->bindValue(":historico","$historico");
$query->bindValue(":valor","$valor");
$query->bindValue(":numerosdias","$numerosdias");
$query->bindValue(":valor_limite","$valor_limite");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>