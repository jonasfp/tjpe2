<?php 


require_once('../../../conexao.php');

$tabelahonorarioscondenacao = 'honorarios_condenacao';



$historico=$_POST['historicocondenacao'];
$percentual=$_POST['percentualcondenacao'];
$total=$_POST['honorariostotalcondenacao'];

$query = $pdo->prepare("INSERT INTO $tabelahonorarioscondenacao SET historico = :historico, percentual = :percentual, total = :total");

$query->bindValue(":historico","$historico");
$query->bindValue(":percentual","$percentual");
$query->bindValue(":total","$total");

$query->execute();


echo 'Salvo com Sucesso';


 ?>