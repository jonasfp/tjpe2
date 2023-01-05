
<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Cálculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    
</head>

<body>

<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div>
<h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3>

<div> <h4 style="text-align:center">CONTADORIA</h4> </div>
<div><h5 style="text-align:center; margin-bottom: 3.0em;">FORUM DES. RODOLFO AURELIANO - AV. DES. GUERRA BARRETO, S/N - ILHA DO LEITE - RECIFE /PE</h5></div>   

<?php
session_start();
require_once('../util/conexao.php');
$tabelaprocesso = 'modulo_custas_processo';
$tabelavara = 'vara';
$tabelaindicescorrecao = 'indices_correcao';
$tabela_modulo_custas_parametros = 'modulo_custas_parametros';
$tabela_modulo_custas_calculadas = 'modulo_custas_calculadas';
$tabela_modulo_custas_custas_taxa = 'modulo_custas_custas_taxa';
$tabela_modulo_custas_embargos = 'modulo_custas_embargos';
$tabela_modulo_custas_extras = 'modulo_custas_extras';
$id_processo = $_SESSION['id_processo'];


setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));

echo <<<HTML
<!--
<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div> 
<h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3>  -->   

<h2 style="text-align:center;margin-bottom:15px">MEMÓRIA DE CÁLCULO</h2>

<!--

<h5 style="text-align:center; margin-bottom: 3.0em;">FORUM DES. RODOLFO AURELIANO - AV. DES. GUERRA BARRETO, S/N - ILHA DO LEITE - RECIFE /PE</h5> -->

HTML;    

$query = $pdo->query("SELECT P.id, P.processo, V.nome, P.devedores FROM $tabelaprocesso P INNER JOIN $tabelavara V ON P.varaid=V.id WHERE P.id = $id_processo");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);


if($total_reg>0){

$tabela = $tabelaprocesso;

echo <<<HTML

    <table class="table table-hover" id="modulo_custas_processo" >
    <thead>
    <tr class="active">
    <th>Numero do processo</th>
    <th>Vara</th>
    <th>Devedor(es)</th>          
    <th style="text-align: right;"></th>          
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    
    foreach ($res[$i] as $key => $value) {
        $id = $res[$i]['id'];
        $processo = $res[$i]['processo'];        
        $varaid = $res[$i]['nome'];
        $devedores = $res[$i]['devedores'];
            
    }



echo <<<HTML

<tr>

 <td id="processo">{$processo}</td>
 <td id="vara">{$varaid}</td>
 <td>{$devedores}</td>
 <td style="text-align: right;"></td>

</tr>

HTML;

}

echo <<<HTML

</tbody>

<small><div align = "center" id="mensagem-excluir"></div></small>
</table>

HTML;

} 

else {

    //echo 'Não possui registro cadastrado!';
}

$query = $pdo->query("SELECT I.id, P.id, I.nomeindice, P.datafinal_correcao, P.id_processo FROM $tabela_modulo_custas_parametros P INNER JOIN $tabelaindicescorrecao I ON P.indice_correcao_id = I.id WHERE P.id_processo = $id_processo");

$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){

    $tabela = $tabela_modulo_custas_parametros;

echo <<<HTML

    <table class="table table-hover" id="modulo_custas_parametros">
    <thead>
    <tr class="active">
    <th>Correção monetária</th>
    <th>Data do cálculo</th>          
    <th style="text-align: right;"></th>          
    </tr>
    </thead>
    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {
        $id = $res[$i]['id'];        
        $nomeindice = $res[$i]['nomeindice'];
        $datafinal_correcao = $res[$i]['datafinal_correcao'];
              
    }

$datafinal_correcaoF = date('m/Y', strtotime($datafinal_correcao));


echo <<<HTML

<tr>
 <td>{$nomeindice}</td>
 <td>{$datafinal_correcaoF}</td>
 <td style="text-align: right;"></td>      
       
</tr>

HTML;

}

echo <<<HTML

</tbody>

<small><div align = "center" id="mensagem-excluir"></div></small>
</table>

HTML;

} 

else {

    //echo 'Não possui registro cadastrado!';
}

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_calculadas WHERE id_processo = $id_processo ORDER BY dataevento asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){

$tabela = $tabela_modulo_custas_calculadas;

echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>CALCULADAS/PAGAS</h5></div> 

    <table class="table table-hover" id="modulo_custas_calculadas">
    <thead>
    <tr class="active">
    <th>Tipo de custas</th>
    <th>Data</th>
    <th>Histórico</th>
    <th>Custas processuais(R$)</th>      
    <th>Taxa judiciária(R$)</th>
    <th>Custas atualizadas(R$)</th>      
    <th>Taxa atualizada(R$)</th>
    <th>Total($)</th>       
    <th style="text-align: right;"></th>       
    </tr>
    </thead>
    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {
        $id = $res[$i]['id'];             
        $tipo = $res[$i]['tipo'];
        $dataevento = $res[$i]['dataevento'];
        $historico = $res[$i]['historico'];
        $valor_custas = $res[$i]['valor_custas'];
        $valor_taxa = $res[$i]['valor_taxa'];
        $valor_custas_atualizadas = $res[$i]['valor_custas_atualizadas'];        
        $valor_taxa_atualizada = $res[$i]['valor_taxa_atualizada'];        
        $total_custas_taxa = $res[$i]['total_custas_taxa'];        
    }

    if($tipo == "Pagas"){

        
        $valor_custas = $valor_custas * (-1); 
        $valor_taxa = $valor_taxa * (-1);
        $valor_custas_atualizadas = $valor_custas_atualizadas * (-1); 
        $valor_taxa_atualizada =   $valor_taxa_atualizada * (-1);
        $total_custas_taxa = $total_custas_taxa * (-1);

    $valor_custasPagasF = number_format($valor_custas, 2, ',', '.');
    $valor_taxaPagasF = number_format($valor_taxa, 2, ',', '.');
    $valor_custas_atualizadasPagasF = number_format($valor_custas_atualizadas, 2, ',', '.');
    $valor_taxa_atualizadaPagasF = number_format($valor_taxa_atualizada, 2, ',', '.');
    $total_custas_taxaPagasF = number_format($total_custas_taxa, 2, ',', '.');
    

    $valor_custasF = '('.$valor_custasPagasF.')';
    $valor_taxaF = '('.$valor_taxaPagasF.')';
    $valor_custas_atualizadasF = '('.$valor_custas_atualizadasPagasF.')';
    $valor_taxa_atualizadaF = '('.$valor_taxa_atualizadaPagasF.')';
    $total_custas_taxaF = '('.$total_custas_taxaPagasF.')';

    $dataeventoF = date('m/Y', strtotime($dataevento));

    } else {

        $valor_custas = $valor_custas; 
        $valor_taxa = $valor_taxa;
        $valor_custas_atualizadas = $valor_custas_atualizadas; 
        $valor_taxa_atualizada = $valor_taxa_atualizada;
        $total_custas_taxa = $total_custas_taxa;

    $valor_custasF = number_format($valor_custas, 2, ',', '.');
    $valor_taxaF = number_format($valor_taxa, 2, ',', '.');
    $valor_custas_atualizadasF = number_format($valor_custas_atualizadas, 2, ',', '.');
    $valor_taxa_atualizadaF = number_format($valor_taxa_atualizada, 2, ',', '.');
    $total_custas_taxaF = number_format($total_custas_taxa, 2, ',', '.');
    $dataeventoF = date('m/Y', strtotime($dataevento)); 

    }

    


echo <<<HTML

<tr>

 <td>{$tipo}</td>
 <td>{$dataeventoF}</td>
 <td>{$historico}</td>
 <td>{$valor_custasF}</td> 
 <td>{$valor_taxaF}</td> 
 <td>{$valor_custas_atualizadasF}</td> 
 <td>{$valor_taxa_atualizadaF}</td> 
 <td>{$total_custas_taxaF}</td>
 <td style="text-align: right;"></td>

</tr>

HTML;

}

echo <<<HTML

</tbody>

<small><div align = "center" id="mensagem-excluir"></div></small>
</table>

HTML;

} 

else {

    //echo 'Não possui registro cadastrado!';
}

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_custas_taxa WHERE id_processo = $id_processo ORDER BY dataevento asc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){

$tabela = $tabela_modulo_custas_custas_taxa; 


echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>DEVIDAS</h5></div> 

    <table class="table table-hover" id="modulo_custas_custas_taxa">
    <thead>
    <tr class="active">
    <th>Tipo de custas</th>
    <th>Data</th>
    <th>Histórico</th>
    <th>Valor base(R$)</th>
    <th>Custas processuais(R$)</th>         
    <th>Taxa judiciária(R$)</th>    
    <th>Total(R$)</th>       
    <th style="text-align: right;"></th>       
    </tr>
    </thead>
    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {
        $id = $res[$i]['id'];        
        $tipo = $res[$i]['tipo'];
        $dataevento = $res[$i]['dataevento'];
        $historico = $res[$i]['historico'];
        $valor_causa = $res[$i]['valor_causa'];
        $valor_custas = $res[$i]['valor_custas'];
        $valor_taxa = $res[$i]['valor_taxa'];        
        $total_custas_taxa = $res[$i]['total_custas_taxa'];      
           
    }

    $dataeventoF = date('m/Y', strtotime($dataevento));
    $valor_causaF = number_format($valor_causa, 2, ',', '.');
    $valor_custasF = number_format($valor_custas, 2, ',', '.');
    $valor_taxaF = number_format($valor_taxa, 2, ',', '.');
    $total_custas_taxaF = number_format($total_custas_taxa, 2, ',', '.');
    

echo <<<HTML

<tr>

 <td>{$tipo}</td>
 <td>{$dataeventoF}</td>
 <td>{$historico}</td>
 <td>{$valor_causaF}</td> 
 <td>{$valor_custasF}</td> 
 <td>{$valor_taxaF}</td> 
 <td>{$total_custas_taxaF}</td>

</tr>

HTML;

}

echo <<<HTML

</tbody>

<small><div align = "center" id="mensagem-excluir"></div></small>
</table>

HTML;

} 

else {

    //echo 'Não possui registro cadastrado!';
}

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_embargos WHERE id_processo = $id_processo ORDER BY dataevento asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){

$tabela = $tabela_modulo_custas_embargos; 

echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>EMBARGOS</h5></div> 

    <table class="table table-hover" id="modulo_custas_embargos">
    <thead>
    <tr class="active">
    <th>Tipo de custas</th>
    <th>Data</th>
    <th>Histórico</th>
    <th>Valor da execução(R$)</th>
    <th>Percentual(%)</th>
    <th>Custas processuais(R$)</th>     
    <th>Taxa judiciária(R$)</th>    
    <th>Total(R$)</th>       
    <th style="text-align: right;"></th>       
    </tr>
    </thead>
    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {
        $id = $res[$i]['id'];        
        $tipo = $res[$i]['tipo'];
        $dataevento = $res[$i]['dataevento'];
        $historico = $res[$i]['historico'];
        $valor_execucao = $res[$i]['valor_execucao'];
        $tipopercentual = $res[$i]['tipopercentual'];
        $valor_custas = $res[$i]['valor_custas'];        
        $valor_taxas = $res[$i]['valor_taxas'];        
        $valor_total = $res[$i]['valor_total'];        
    }

    $valor_execucaoF = number_format($valor_execucao, 2, ',', '.');
    $valor_custasF = number_format($valor_custas, 2, ',', '.');
    $valor_taxaF = number_format($valor_taxas, 2, ',', '.');
    $valor_totalF = number_format($valor_total, 2, ',', '.');
    $dataeventoF = date('m/Y', strtotime($dataevento));


echo <<<HTML

<tr>

 <td>{$tipo}</td>
 <td>{$dataeventoF}</td>
 <td>{$historico}</td>
 <td>{$valor_execucaoF}</td>
 <td>{$tipopercentual}</td>
 <td>{$valor_custasF}</td> 
 <td>{$valor_taxaF}</td> 
 <td>{$valor_totalF}</td>

</tr>

HTML;

}

echo <<<HTML
</tbody>

<small><div align = "center" id="mensagem-excluir"></div></small>
</table>

HTML;

} 

else {

    //echo 'Não possui registro cadastrado!';
}

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_extras WHERE id_processo = $id_processo ORDER BY dataevento asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){

$tabela = $tabela_modulo_custas_extras;


echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>EXTRAS/DESPESAS</h5></div>

    <table class="table table-hover" id="modulo_custas_extras">

    <thead>
    <tr class="active">
    <th>Tipo de custas</th>
    <th>Data</th>
    <th>Histórico</th>
    <th>Quantidade</th>
    <th>Valor unitário(R$)</th>      
    <th>Total(R$)</th>       
    <th style="text-align: right;"></th>       
    </tr>
    </thead>
    

    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {
        $id = $res[$i]['id'];        
        $tipo = $res[$i]['tipo'];
        $dataevento = $res[$i]['dataevento'];
        $historico = $res[$i]['historico'];
        $quantidade = $res[$i]['quantidade'];
        $valor_unitario = $res[$i]['valor_unitario'];
        $total_extras = $res[$i]['total_extras'];       
         
           
    }
    $dataeventoF = date('m/Y', strtotime($dataevento));
    $valor_unitarioF = number_format($valor_unitario, 2, ',', '.');
    $total_extrasF = number_format($total_extras, 2, ',', '.');
    

echo <<<HTML

<tr>

 <td>{$tipo}</td>
 <td>{$dataeventoF}</td>
 <td>{$historico}</td>
 <td>{$quantidade}</td>
 <td>{$valor_unitarioF}</td>
 <td>{$total_extrasF}</td>

</tr>

HTML;

}

echo <<<HTML

</tbody>

<small><div align = "center" id="mensagem-excluir"></div></small>
</table>

HTML;

} else {

    //echo 'Não possui registro cadastrado!';
}

/*****************************CALCULADAS/PAGAS***********************************/

$query_soma_custas_calculadas_pagas = "SELECT SUM(valor_custas_atualizadas) AS total_custas_taxa FROM $tabela_modulo_custas_calculadas WHERE id_processo = $id_processo";
$res_soma_custas = $pdo->prepare($query_soma_custas_calculadas_pagas);
$res_soma_custas->execute();
$row_total_custas=$res_soma_custas->fetch(PDO::FETCH_ASSOC);
$total_custas_calculadas_pagas = $row_total_custas['total_custas_taxa'];


$query_soma_taxa_calculadas_pagas = "SELECT SUM(valor_taxa_atualizada) AS total_custas_taxa FROM $tabela_modulo_custas_calculadas WHERE id_processo = $id_processo";
$res_soma_taxa = $pdo->prepare($query_soma_taxa_calculadas_pagas);
$res_soma_taxa->execute();
$row_total_taxa=$res_soma_taxa->fetch(PDO::FETCH_ASSOC);
$total_taxa_calculadas_pagas = $row_total_taxa['total_custas_taxa'];

/**********************************DEVIDAS*******************************/

$query_soma_custas_taxas_devidas = "SELECT SUM(valor_custas) AS total_custas_taxa_devidas FROM $tabela_modulo_custas_custas_taxa WHERE id_processo = $id_processo";
$res_soma_custas_devidas = $pdo->prepare($query_soma_custas_taxas_devidas);
$res_soma_custas_devidas->execute();
$row_total_custas_devidas=$res_soma_custas_devidas->fetch(PDO::FETCH_ASSOC);
$total_custas_devidas = $row_total_custas_devidas['total_custas_taxa_devidas'];


$query_soma_taxa_calculadas_pagas = "SELECT SUM(valor_taxa) AS total_custas_taxa_devidas FROM $tabela_modulo_custas_custas_taxa WHERE id_processo = $id_processo";
$res_soma_taxa_devida = $pdo->prepare($query_soma_taxa_calculadas_pagas);
$res_soma_taxa_devida->execute();
$row_total_taxa_devida=$res_soma_taxa_devida->fetch(PDO::FETCH_ASSOC);
$total_taxa_devida = $row_total_taxa_devida['total_custas_taxa_devidas'];

/**********************************EMBARGOS*********************************/

$query_soma_custas_embargos = "SELECT SUM(valor_custas) AS total_custas_embargos FROM $tabela_modulo_custas_embargos WHERE id_processo = $id_processo";
$res_soma_custas_embargos = $pdo->prepare($query_soma_custas_embargos);
$res_soma_custas_embargos->execute();
$row_total_custas_embargos=$res_soma_custas_embargos->fetch(PDO::FETCH_ASSOC);
$total_custas_embargos = $row_total_custas_embargos['total_custas_embargos'];

$query_soma_taxa_embargos = "SELECT SUM(valor_taxas) AS total_taxas_embargos FROM $tabela_modulo_custas_embargos";
$res_soma_taxa_embargos = $pdo->prepare($query_soma_taxa_embargos);
$res_soma_taxa_embargos->execute();
$row_total_taxa_embargos=$res_soma_taxa_embargos->fetch(PDO::FETCH_ASSOC);
$total_taxa_embargos = $row_total_taxa_embargos['total_taxas_embargos'];

/********************************EXTRAS/DESPESAS**********************************/

$query_soma_custas_despesas_extras = "SELECT SUM(total_extras) AS total_custas_despesas_extras FROM $tabela_modulo_custas_extras WHERE id_processo = $id_processo";
$res_soma_custas_despesas_extras = $pdo->prepare($query_soma_custas_despesas_extras);
$res_soma_custas_despesas_extras->execute();
$row_total_custas_despesas_extras=$res_soma_custas_despesas_extras->fetch(PDO::FETCH_ASSOC);
$total_custas_despesas_extras = number_format($row_total_custas_despesas_extras['total_custas_despesas_extras'], 2, ',', '.');


/******************************************************************************/

$total_custas = number_format(floatval($total_custas_calculadas_pagas)+floatval($total_custas_devidas)+floatval($total_custas_embargos), 2, ',', '.');


$total_taxa = number_format(floatval($total_taxa_calculadas_pagas)+floatval($total_taxa_devida)+floatval($total_taxa_embargos), 2, ',', '.');

$total_custas_depesas_extras = number_format(floatval($total_custas_despesas_extras), 2, ',', '.');

$total_custas_taxas_depesas_extras = number_format(floatval($total_custas_calculadas_pagas)+floatval($total_custas_devidas)+floatval($total_custas_embargos)+floatval($total_taxa_calculadas_pagas)+floatval($total_taxa_devida)+floatval($total_taxa_embargos)+floatval($total_custas_despesas_extras), 2, ',', '.');

if($total_custas < 0 || $total_taxa < 0 || $total_custas_depesas_extras < 0 || $total_custas_taxas_depesas_extras < 0 ){

    $total_custas = 0;
    $total_taxa = 0;
    $total_custas_depesas_extras = 0;
    $total_custas_taxas_depesas_extras = 0;

}
/********************************************************************************/





/********************************************************************************/

echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>TOTAL</h5></div>

    <table class="table table-hover" id="modulo_total_custas">

    <thead>
    <tr class="active">
    <th>Total de custas processuais(R$)</th>
    <th>Total de taxa judiciária(R$)</th>
    <th>Total custas/despesas extras(R$)</th>
    <th>Valor total devido(R$)</th>
     
    </tr>
    </thead>
    
    <tbody>

HTML;
    
       

echo <<<HTML

<tr>

<td id="total_custas">{$total_custas}</td>
<td id="total_taxa">{$total_taxa}</td>
<td id="total_custas_depesas_extras">{$total_custas_depesas_extras}</td>
<td id="total_custas_taxas_depesas_extras">{$total_custas_taxas_depesas_extras}</td>
   
</tr>

HTML;



echo <<<HTML

</tbody>

<small><div align = "center" id="mensagem-excluir"></div></small>
</table>

HTML;


echo <<<HTML

<small><div align = "center" style='margin-top: 50px;' id="contadoria">CONTADORIA</div></small>
<div align = "center" id="data_totalizacao">$data_hoje</div>

HTML;


?>


</body>


</html>