<?php 
$banco = 'tjpe';
$usuario = 'root'; 
$senha = '';
$servidor = 'localhost';

date_default_timezone_set('America/Sao_Paulo');

try{
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8","$usuario","$senha");
} catch (Exception $e){
	echo 'Não conectado ao banco de dados! <br><br>' .$e;
}

$nome_sistema = 'Contadoria do Tribunal de Justiça de Pernambuco';
$email_sistema = 'jonaspaixao@gmail.com';

 ?>