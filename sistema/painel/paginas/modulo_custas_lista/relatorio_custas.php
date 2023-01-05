<!DOCTYPE html>
<html>

<div class = "bs-example widget-shadow" style="padding: 20px">

<body>

    <?php
session_start();
require_once('../../../util/conexao.php');
$tabela_modulo_custas_totalizacao = 'modulo_custas_totalizacao';
@unlink($selected_processo = $_POST['processo']);
@unlink($selected_select = $_POST['select']);
@unlink($datestart = $_POST['datestart']);
@unlink($dateend = $_POST['dateend']);

$stringOne = $datestart;
$stringTwo = $dateend;
$pattern = '/(\d*)-(\d*)-(\d*).*/';
$replacement = '$3-$2-$1' ;
$bddatestart = preg_replace($pattern, $replacement, $stringOne);
$bddateend = preg_replace($pattern, $replacement, $stringTwo);


if(empty($selected_processo) && isset($selected_select)){


if ($selected_select != "Listar todos"){

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_totalizacao WHERE vara = '$selected_select'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

} else {

$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_totalizacao");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

}
  

} elseif (isset($selected_processo) && empty($selected_select)){


$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_totalizacao WHERE processo = '$selected_processo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);


} else {


$query = $pdo->query("SELECT * FROM $tabela_modulo_custas_totalizacao WHERE data BETWEEN '$bddatestart' AND '$bddateend' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
 
}  

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));


echo <<<HTML

<div id="titulo" name="titulo"><h2 style="text-align:center;margin-bottom:15px">CÁLCULOS</h2></div>

HTML; 


if ($total_reg==0){

echo <<<HTML

<h4 style="text-align:center;margin-top:30px;color:red">Não foram localizados cálculos na pesquisa!</h4>

HTML;

}   


if($total_reg>0){


 echo <<<HTML


<table class="table table-hover" id="modulo_relatorio _custas">

<thead>

<tr class="active">

<th>Vara</th>
<th>Processo</th>
<th>Custas processuais(R$)</th>
<th>Taxa judiciária(R$)</th>
<th>Taxa de registro(R$)</th>
<th>Despesas processuais(R$)</th>
<th>Valor total devido(R$)</th>
<th>Data do cálculo</th>
<th>Ação</th>

</tr>

</thead>

<tbody>

HTML;

    for($i=0; $i<$total_reg;$i++){
        foreach ($res[$i] as $key => $value) {
            $id = $res[$i]['id'];             
            $vara = $res[$i]['vara'];
            $processo = $res[$i]['processo'];
            $total_custas = $res[$i]['total_custas'];
            $total_taxa = $res[$i]['total_taxa'];
            $total_taxa_registro = $res[$i]['total_taxa_registro'];
            $total_despesas = $res[$i]['total_despesas'];        
            $total_totalizacao = $res[$i]['total_totalizacao'];        
            $data = $res[$i]['data'];        
        }

       
        echo <<<HTML

        <tr>

        <td>{$vara}</td>
        <td>{$processo}</td>
        <td>{$total_custas}</td>
        <td>{$total_taxa}</td> 
        <td>{$total_taxa_registro}</td> 
        <td>{$total_despesas}</td> 
        <td>{$total_totalizacao}</td> 
        <td>{$data}</td>

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


}

echo <<<HTML

<small><div align = "center" style='margin-top: 50px;' id="contadoria">CONTADORIA</div></small>
<div align = "center" id="data_totalizacao">$data_hoje</div>

<div align = "right">


<a href="../rel/modulo_custas.php" target="_blank" id="imprimir"><button class="btn btn-primary">Imprimir</button></a>


</div>

HTML;


?>


</body>
</html>

</div>

<script>

    //Bloqueia o menu suspenso ao clicar com o botão direito do mouse

    document.addEventListener('contextmenu', function(event) {
        event.preventDefault();

    });

    //Bloqueia o CTRL+P

    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.key === 'p') {
            event.preventDefault();
        }
    });

    $('#imprimir').click(function(event) {
        event.preventDefault();
    });

</script>


