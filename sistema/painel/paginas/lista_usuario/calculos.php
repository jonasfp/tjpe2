<?php 
require_once('../../../conexao.php');
$tabelaprocesso = 'processo';
$tabelavara = 'vara';
$tabelaindicescorrecao = 'indices_correcao';
$tabelajuros = 'juros';
$tabelaparametros = 'parametros_calculos_danos_materiais_morais';
$tabelaparcelas = 'parcelas';
$tabelahonorarioscondenacao = 'honorarios_condenacao';
$tabelahonorarioscausa = 'honorarios_causa';
$tabelahonorariosdeterminado = 'honorarios_determinado';
$tabelacustas = 'custas';
$tabelahonorariosmultaart523 = 'honorarios_multa';
$tabelamultacondenacao = 'multa_condenacao'; 
$tabelamultacausa = 'multa_causa'; 
$tabelamultadeterminado = 'multa_determinado';
$tabelamultadiaria = 'multa_diaria';

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));

echo <<<HTML

<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div>
<h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3>     

<h4 style="text-align:center">CONTADORIA</h4>
<h5 style="text-align:center; margin-bottom: 3.0em;">FORUM DES. RODOLFO AURELIANO - AV. DES. GUERRA BARRETO, S/N - ILHA DO LEITE - RECIFE /PE</h5>

HTML;    

//$query = $pdo->query("SELECT * FROM $tabelaprocesso ORDER BY id desc");
$query = $pdo->query("SELECT P.processo, V.nome, P.exequente, P.executado FROM $tabelaprocesso P INNER JOIN $tabelavara V ON P.varaid=V.id");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML

    <table class="table table-hover " id="tabelaprocesso" >
    <thead>
    <tr class="active">
    <th>Numero do processo</th>
    <th>Vara</th>
    <th>Exequente</th>
    <th>Executado</th>      
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $processo = $res[$i]['processo'];
        $varaid = $res[$i]['nome'];
        $exequente = $res[$i]['exequente'];
        $executado = $res[$i]['executado'];        
    }

echo <<<HTML
<tr>
 <td>{$processo}</td>
 <td>{$varaid}</td>
 <td>{$exequente}</td>
 <td>{$executado}</td> 

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


//$query = $pdo->query("SELECT * FROM $tabelaparametros ORDER BY id desc");
$query = $pdo->query("SELECT I.nomeindice, P.datafinal_correcao, J.nome, P.datainicial_juros, P.datafinal_juros FROM $tabelaparametros P INNER JOIN $tabelaindicescorrecao I ON P.indice_correcao_id = I.id INNER JOIN $tabelajuros J ON P.jurosid=J.id");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML

    <table class="table table-hover" id="tabelaparametros">
    <thead>
    <tr class="active">
    <th>Correção monetária</th>
    <th>Termo final</th>
    <th>Juros de mora</th>
    <th>Termo inicial</th>      
    <th>Termo final</th>      
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $indice_correcao_id = $res[$i]['nomeindice'];
        $datafinal_correcao = $res[$i]['datafinal_correcao'];
        $jurosid = $res[$i]['nome'];
        $datainicial_juros = $res[$i]['datainicial_juros'];        
        $datafinal_juros = $res[$i]['datafinal_juros'];        
    }

echo <<<HTML
<tr>
 <td>{$indice_correcao_id}</td>
 <td>{$datafinal_correcao}</td>
 <td>{$jurosid}</td>
 <td>{$datainicial_juros}</td> 
 <td>{$datafinal_juros}</td> 

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

$query = $pdo->query("SELECT * FROM $tabelaparcelas ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML

    <table class="table table-hover" id="tabelaparcelas">
    <thead>
    <tr class="active">
    <th>Data</th>
    <th>Histórico</th>
    <th>Valor($)</th>
    <th>Correção monetária</th>      
    <th>Juros de mora(Nº dias)</th>
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $dataevento = $res[$i]['dataevento'];
        $historico = $res[$i]['historico'];
        $valor = $res[$i]['valor'];
        $numero_dias = $res[$i]['numero_dias'];
        $indice_correcao_id = $res[$i]['indice_correcao_id'];        
        $total_parcela = $res[$i]['total_parcela'];        
    }

echo <<<HTML
<tr>
 <td>{$dataevento}</td>
 <td>{$historico}</td>
 <td>{$valor}</td> 
 <td>{$indice_correcao_id}</td>
 <td>{$numero_dias}</td>
 <td>{$total_parcela}</td> 

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

$query = $pdo->query("SELECT * FROM $tabelahonorarioscondenacao ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4>HONORÁRIOS SUCUMBENCIAIS</h4></div> 
    
    <table class="table table-hover" id="tabelahonorarioscondenacao">
    <thead>
    <tr class="active">    
    <th>Histórico</th>
    <th>Percentual(%)</th>    
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $historico = $res[$i]['historico'];
        $percentual = $res[$i]['percentual'];
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$historico}</td>
 <td>{$percentual}</td>
 <td>{$total}</td>
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

$query = $pdo->query("SELECT * FROM $tabelahonorarioscausa ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4>HONORÁRIOS SUCUMBENCIAIS</h4></div>
    
    <table class="table table-hover" id="tabelahonorarioscausa">
    <thead>
    <tr class="active">    
    <th>Data</th>
    <th>Histórico</th>    
    <th>Valor da causa($)</th>    
    <th>Percentual(%)</th>    
    <th>Fator de correção</th>    
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $data = $res[$i]['data'];
        $historico = $res[$i]['historico'];
        $percentual = $res[$i]['percentual'];
        $valor = $res[$i]['valor'];       
        $indicecorrecao = $res[$i]['indicecorrecao'];          
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$data}</td>
 <td>{$historico}</td>
 <td>{$percentual}</td> 
 <td>{$valor}</td>
 <td>{$indicecorrecao}</td>
 <td>{$total}</td>
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

$query = $pdo->query("SELECT * FROM $tabelahonorariosdeterminado ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4 style>HONORÁRIOS SUCUMBENCIAIS</h4></div>
    <table class="table table-hover" id="tabelahonorariosdeterminado">
    <thead>
    <tr class="active">    
    <th>Data</th>
    <th>Histórico</th>    
    <th>Valor determinado($)</th>  
    <th>Fator de correção</th>    
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $data = $res[$i]['data'];
        $historico = $res[$i]['historico'];        
        $valor = $res[$i]['valor'];       
        $indicecorrecao = $res[$i]['indicecorrecao'];          
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$data}</td>
 <td>{$historico}</td> 
 <td>{$valor}</td>
 <td>{$indicecorrecao}</td>
 <td>{$total}</td>
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

$query = $pdo->query("SELECT * FROM $tabelacustas ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4 style>CUSTAS</h4></div>   
    <table class="table table-hover" id="tabelacustas">
    <thead>
    <tr class="active">    
    <th>Tipo</th>
    <th>Data</th>
    <th>Histórico</th>    
    <th>Valor($)</th>  
    <th>Fator de correção</th>    
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $tipo = $res[$i]['tipo'];
        $data = $res[$i]['data'];
        $historico = $res[$i]['historico'];        
        $valor = $res[$i]['valor'];       
        $indicecorrecao = $res[$i]['indicecorrecao'];          
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$tipo}</td>
 <td>{$data}</td>
 <td>{$historico}</td> 
 <td>{$valor}</td>
 <td>{$indicecorrecao}</td>
 <td>{$total}</td>
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

$query = $pdo->query("SELECT * FROM $tabelahonorariosmultaart523 ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4 style>HONORÁRIOS + MULTA (Art. 523)</h4></div>    
    <table class="table table-hover" id="tabelahonorariosmultaart523">
    <thead>
    <tr class="active">
    <th>Histórico</th>    
    <th>Percentual(%)</th>    
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {      
        
        $historico = $res[$i]['historico'];        
        $percentual = $res[$i]['percentual'];    
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$historico}</td>
 <td>{$percentual}</td>
 <td>{$total}</td>
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


$query = $pdo->query("SELECT * FROM $tabelamultacondenacao ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4 style>MULTA</h4></div>
    <table class="table table-hover" id="tabelamultacondenacao">
    <thead>
    <tr class="active">    
    <th>Histórico</th>
    <th>Percentual(%)</th>    
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $historico = $res[$i]['historico'];
        $percentual = $res[$i]['percentual'];
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$historico}</td>
 <td>{$percentual}</td>
 <td>{$total}</td>
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

$query = $pdo->query("SELECT * FROM $tabelamultacausa ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4 style>MULTA</h4></div>

    <table class="table table-hover" id="tabelamultacausa">
    <thead>
    <tr class="active">    
    <th>Data</th>
    <th>Histórico</th>    
    <th>Valor da causa($)</th>    
    <th>Percentual(%)</th>    
    <th>Fator de correção</th>    
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $data = $res[$i]['data'];
        $historico = $res[$i]['historico'];
        $percentual = $res[$i]['percentual'];
        $valor = $res[$i]['valor'];       
        $indicecorrecao = $res[$i]['indicecorrecao'];          
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$data}</td>
 <td>{$historico}</td>
 <td>{$percentual}</td> 
 <td>{$valor}</td>
 <td>{$indicecorrecao}</td>
 <td>{$total}</td>
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

$query = $pdo->query("SELECT * FROM $tabelamultadeterminado ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4 style>MULTA</h4></div>

    <table class="table table-hover" id="tabelamultadeterminado">
    <thead>
    <tr class="active">    
    <th>Data</th>
    <th>Histórico</th>    
    <th>Valor determinado($)</th>  
    <th>Fator de correção</th>    
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $data = $res[$i]['data'];
        $historico = $res[$i]['historico'];        
        $valor = $res[$i]['valor'];       
        $indicecorrecao = $res[$i]['indicecorrecao'];          
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$data}</td>
 <td>{$historico}</td> 
 <td>{$valor}</td>
 <td>{$indicecorrecao}</td>
 <td>{$total}</td>
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

$query = $pdo->query("SELECT * FROM $tabelamultadiaria ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML
    <div style="text-align: left; font-family:Arial; margin-top: 40px; margin-bottom:20px"><h4 style>MULTA</h4></div>

    <table class="table table-hover" id="tabelamultadiaria">
    <thead>
    <tr class="active">  
    <th>Histórico</th>    
    <th>Valor da multa($)</th>  
    <th>Valor limite($)</th>    
    <th>Data de início</th>       
    <th>Data do fim</th>       
    <th>Número de dias</th>       
    <th>Total($)</th>       
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {        
        $historico = $res[$i]['historico'];
        $valor = $res[$i]['valor'];        
        $valor_limite = $res[$i]['valor_limite'];       
        $data_inicial = $res[$i]['data_inicial'];          
        $data_final = $res[$i]['data_final'];          
        $numerosdias = $res[$i]['numerosdias'];          
        $total = $res[$i]['total'];          
    }

echo <<<HTML
<tr>
 <td>{$historico}</td>
 <td>{$valor}</td> 
 <td>{$valor_limite}</td>
 <td>{$data_inicial}</td>
 <td>{$data_final}</td>
 <td>{$numerosdias}</td>
 <td>{$total}</td>
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

echo <<<HTML

<small><div align = "center" style='margin-top: 50px;' id="contadoria">CONTADORIA</div></small>
<div align = "center">$data_hoje</div>

HTML;

?>
