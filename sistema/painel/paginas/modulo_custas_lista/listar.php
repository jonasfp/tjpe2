<?php 
require_once('../../../conexao.php');
$tabelaprocesso = 'modulo_custas_processo';
$tabelavara = 'vara';
$tabelaindicescorrecao = 'indices_correcao';
$tabela_modulo_custas_parametros = 'modulo_custas_parametros';
$tabela_modulo_custas_calculadas = 'modulo_custas_calculadas';
$tabela_modulo_custas_custas_taxa = 'modulo_custas_custas_taxa';
$tabela_modulo_custas_embargos = 'modulo_custas_embargos';
$tabela_modulo_custas_extras = 'modulo_custas_extras';


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

$query = $pdo->query("SELECT P.processo, V.nome, P.devedores FROM $tabelaprocesso P INNER JOIN $tabelavara V ON P.varaid=V.id");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


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
        $processo = $res[$i]['processo'];
        $varaid = $res[$i]['nome'];
        $devedores = $res[$i]['devedores'];
            
    }

echo <<<HTML

<tr>

 <td>{$processo}</td>
 <td>{$varaid}</td>
 <td>{$devedores}</td>

 <td style="text-align: right;">

        <big><a href="#" onclick="editar()" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>
       
        <li class="dropdown head-dpdn2" style="display: inline-block;">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

        <ul class="dropdown-menu" style="margin-left:-230px;">

        <li>

        <div class="notification_desc2">

        <p>Confirmar Exclusão? <a href="#" onclick="excluir()"><span class="text-danger">Sim</span></a></p>
        </div>

        </li> 

        </ul>

        </li>       


        </td>

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


$query = $pdo->query("SELECT I.nomeindice, P.datafinal_correcao FROM $tabela_modulo_custas_parametros P INNER JOIN $tabelaindicescorrecao I ON P.indice_correcao_id = I.id");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


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
        $indice_correcao_id = $res[$i]['nomeindice'];
        $datafinal_correcao = $res[$i]['datafinal_correcao'];
              
    }

$datafinal_correcaoF = date('m/Y', strtotime($datafinal_correcao));


echo <<<HTML

<tr>
 <td>{$indice_correcao_id}</td>
 <td>{$datafinal_correcaoF}</td>

 <td style="text-align: right;">
        
        

        </td>
 
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

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_calculadas ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>CALCULADAS/PAGAS</h5></div> 

    <table class="table table-hover" id="modulo_custas_calculadas">
    <thead>
    <tr class="active">
    <th>Tipo de custas</th>
    <th>Data</th>
    <th>Histórico</th>
    <th>Custas processuais($)</th>      
    <th>Taxa judiciária($)</th>
    <th>Custas atualizadas($)</th>      
    <th>Taxa atualizada($)</th>
    <th>Total($)</th>       
    <th style="text-align: right;"></th>       
    </tr>
    </thead>
    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $tipo = $res[$i]['tipo'];
        $dataevento = $res[$i]['dataevento'];
        $historico = $res[$i]['historico'];
        $valor_custas = $res[$i]['valor_custas'];
        $valor_taxa = $res[$i]['valor_taxa'];
        $valor_custas_atualizadas = $res[$i]['valor_custas_atualizadas'];        
        $valor_taxa_atualizada = $res[$i]['valor_taxa_atualizada'];        
        $total_custas_taxa = $res[$i]['total_custas_taxa'];        
    }

    $valor_custasF = number_format($valor_custas, 2, ',', '.');
    $valor_taxaF = number_format($valor_taxa, 2, ',', '.');
    $valor_custas_atualizadasF = number_format($valor_custas_atualizadas, 2, ',', '.');
    $valor_taxa_atualizadaF = number_format($valor_taxa_atualizada, 2, ',', '.');
    $total_custas_taxaF = number_format($total_custas_taxa, 2, ',', '.');
    $dataeventoF = date('m/Y', strtotime($dataevento));


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

 <td style="text-align: right;">
       
        <li class="dropdown head-dpdn2" style="display: inline-block;">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

        <ul class="dropdown-menu" style="margin-left:-230px;">

        <li>

        <div class="notification_desc2">

        <p>Confirmar Exclusão? <a href="#" onclick="excluir()"><span class="text-danger">Sim</span></a></p>
        </div>

        </li> 

        </ul>

        </li>       


        </td>

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

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_custas_taxa ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>DEVIDAS</h5></div> 

    <table class="table table-hover" id="modulo_custas_custas_taxa">
    <thead>
    <tr class="active">
    <th>Tipo de custas</th>
    <th>Data</th>
    <th>Histórico</th>
    <th>Valor base($)</th>
    <th>Custas processuais($)</th>         
    <th>Taxa judiciária($)</th>    
    <th>Total($)</th>       
    <th style="text-align: right;"></th>       
    </tr>
    </thead>
    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $tipo = $res[$i]['tipo'];
        $dataevento = $res[$i]['dataevento'];
        $historico = $res[$i]['historico'];
        $valor_causa = $res[$i]['valor_causa'];
        $valor_custas = $res[$i]['valor_custas'];
        $valor_taxa = $res[$i]['valor_taxa'];        
        $total_custas_taxa = $res[$i]['total_custas_taxa'];      
           
    }

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

 <td style="text-align: right;">
        
        <li class="dropdown head-dpdn2" style="display: inline-block;">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

        <ul class="dropdown-menu" style="margin-left:-230px;">

        <li>

        <div class="notification_desc2">

        <p>Confirmar Exclusão? <a href="#" onclick="excluir()"><span class="text-danger">Sim</span></a></p>
        </div>

        </li> 

        </ul>

        </li>       


        </td> 
 
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

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_embargos ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){

echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>EMBARGOS</h5></div> 

    <table class="table table-hover" id="modulo_custas_embargos">
    <thead>
    <tr class="active">
    <th>Tipo de custas</th>
    <th>Data</th>
    <th>Histórico</th>
    <th>Valor da execução($)</th>
    <th>Percentual(%)</th>
    <th>Custas processuais($)</th>     
    <th>Taxa judiciária($)</th>    
    <th>Total($)</th>       
    <th style="text-align: right;"></th>       
    </tr>
    </thead>
    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
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
    $valor_taxaF = number_format($valor_taxa, 2, ',', '.');
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

 <td style="text-align: right;">
       
        <li class="dropdown head-dpdn2" style="display: inline-block;">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

        <ul class="dropdown-menu" style="margin-left:-230px;">

        <li>

        <div class="notification_desc2">

        <p>Confirmar Exclusão? <a href="#" onclick="excluir()"><span class="text-danger">Sim</span></a></p>
        </div>

        </li> 

        </ul>

        </li>       


        </td>

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

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_extras ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML

<div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h5>EXTRAS/DESPESAS</h5></div>

    <table class="table table-hover" id="modulo_custas_extras">

    <thead>
    <tr class="active">
    <th>Tipo de custas</th>
    <th>Data</th>
    <th>Histórico</th>
    <th>Quantidade</th>
    <th>Valor unitário($)</th>      
    <th>Total($)</th>       
    <th style="text-align: right;"></th>       
    </tr>
    </thead>
    

    <tbody>

HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $tipo = $res[$i]['tipo'];
        $dataevento = $res[$i]['dataevento'];
        $historico = $res[$i]['historico'];
        $quantidade = $res[$i]['quantidade'];
        $valor_unitario = $res[$i]['valor_unitario'];
        $total_extras = $res[$i]['total_extras'];       
         
           
    }

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

 <td style="text-align: right;">
      
        <li class="dropdown head-dpdn2" style="display: inline-block;">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

        <ul class="dropdown-menu" style="margin-left:-230px;">

        <li>

        <div class="notification_desc2">

        <p>Confirmar Exclusão? <a href="#" onclick="excluir()"><span class="text-danger">Sim</span></a></p>
        </div>

        </li> 

        </ul>

        </li>       


        </td> 
 
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

echo <<<HTML

<small><div align = "center" style='margin-top: 50px;' id="contadoria">CONTADORIA</div></small>
<div align = "center">$data_hoje</div>

<div align = "right">

<a href="../rel/modulo_custas.php" target="_blank"><button id="salvartudo" class="btn btn-primary">Imprimir</button></a>

</div>

HTML;

?>