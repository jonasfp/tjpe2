<?php 

@session_start();
require_once('verificar.php');
require_once('../util/conexao.php');

$tabela_modulo_custas_totalizacao = 'modulo_custas_totalizacao';



$queryConta = $pdo->query("SELECT * FROM $tabela_modulo_custas_totalizacao");
$res = $queryConta->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);


$querySoma = "SELECT SUM(total_totalizacao) FROM $tabela_modulo_custas_totalizacao";
$stmt = $pdo->prepare($querySoma);
$stmt->execute();
$res_sum = $stmt->fetch(PDO::FETCH_ASSOC);
$total = $res_sum['SUM(total_totalizacao)'];
$totalSum = number_format($total,0, '.', ',');


?>


<?php

$janeiroQtde = 27; 
$fevereiroQtde = 26; 
$marcoQtde = 31; 
$abrilQtde = 31; 
$maioQtde = 29; 
$junhoQtde = 20; 
$julhoQtde = 20; 
$agostoQtde = 26; 
$setembroQtde = 28; 
$outubroQtde = 25; 
$novembroQtde = 40; 
$dezembroQtde = 17+$total_reg;

$totalAno2022 = $janeiroQtde+$fevereiroQtde+$marcoQtde+$abrilQtde+$maioQtde+$junhoQtde+$julhoQtde+$agostoQtde+$setembroQtde+$outubroQtde+$novembroQtde+$dezembroQtde; 


$ano2016 = 317; 
$ano2017 = 186; 
$ano2018 = 202; 
$ano2019 = 293; 
$ano2020 = 286; 
$ano2021 = 315; 
$ano2022 = $totalAno2022;

$janeiroReais =2138;
$fevereiroReais = 2034; 
$marcoReais = 2423; 
$abrilReais = 1978;
$maioReais = 2187; 
$junhoReais = 2594;
$julhoReais = 2332;
$agostoReais = 2161;
$setembroReais = 1866;
$outubroReais = 2069;
$novembroReais = 2412;
$dezembroReais = 1660+$totalSum;

$totalAno2022Reais = $janeiroReais+$fevereiroReais+$marcoReais+$abrilReais+$maioReais+$junhoReais+$julhoReais+$agostoReais+$setembroReais+$outubroReais+$novembroReais+$dezembroReais;

$ano2016Reais = 14000; 
$ano2017Reais = 15200; 
$ano2018Reais = 16270; 
$ano2019Reais = 18440; 
$ano2020Reais = 19500; 
$ano2021Reais = 20100; 
$ano2022Reais = $totalAno2022Reais;

?>

<div style="margin-bottom:20px">
<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div>
<div style="margin-bottom:10px;"><h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3></div>     

<h4 style="text-align:center">RECIFE</h4>
</div>

	<div class="row-one widgettable">
		<div class="col-md-12 content-top-2 card">

			<div class="agileinfo-cdr">
					<div class="card-header">
                        <h3><strong>Custas processuais e taxa judiciária calculadas (Und) - 2022</strong></h3>                       
                    </div>					
					<div id="Linegraph1" style="width: 98%; height: 350px">
					</div>						
			</div>
		</div>		
</div>

<div class="row-one widgettable">
        <div class="col-md-12 content-top-2 card">

            <div class="agileinfo-cdr">
                    <div class="card-header">
                        <h3><strong>Custas processuais e taxa judiciária calculadas (und) - Desde 2016</strong></h3>

                    </div>                  
                    <div id="Linegraph2" style="width: 98%; height: 350px">
                    </div>                      
            </div>
        </div>      
</div>

<div class="main-page">

    <div class="row-one widgettable">
        <div class="col-md-12 content-top-2 card">

            <div class="agileinfo-cdr">
                    <div class="card-header">
                        <h3><strong>Custas processuais e taxa judiciária calculadas (R$) - 2022</strong></h3>
                    </div>                  
                    <div id="Linegraph3" style="width: 98%; height: 350px">
                    </div>                      
            </div>
        </div>      
</div>

<div class="row-one widgettable">
        <div class="col-md-12 content-top-2 card">

            <div class="agileinfo-cdr">
                    <div class="card-header">
                        <h3><strong>Custas processuais e taxa judiciária calculadas (R$) - Desde de 2016</strong></h3>
                    </div>                  
                    <div id="Linegraph4" style="width: 98%; height: 350px">
                    </div>                      
            </div>
        </div>      
</div>



<script src = "js/ajax_modulo_custas.js"></script>

<div id="relatorio-custas"> </div>

</div>

<script src="js/SimpleChart.js"></script>
	
    
    <script>
    	        
        var graphdata1 = {
            linecolor: "#e32424",
            title: "Numeros de processos calculados mês a mês em 2022",
            values: [
            { X: "Janeiro", Y: <?php echo $janeiroQtde ?>},
            { X: "Fevereiro", Y: <?php echo $fevereiroQtde ?>},
            { X: "Março", Y: <?php echo $marcoQtde ?>},
            { X: "Abril", Y: <?php echo $abrilQtde ?>},
            { X: "Maio", Y:<?php echo $maioQtde ?>},
            { X: "Junho", Y: <?php echo $junhoQtde ?>},
            { X: "Julho", Y: <?php echo $julhoQtde ?>},
            { X: "Agosto", Y: <?php echo $agostoQtde  ?>},
            { X: "Setembro", Y:<?php echo $setembroQtde ?>},
            { X: "Outubro", Y: <?php echo $outubroQtde ?>},
            { X: "Novembro", Y: <?php echo $novembroQtde ?>},
            { X: "Dezembro", Y: <?php echo $dezembroQtde ?>},
                        
            ]
        };
         
       
        $(function () {          
                      
            $("#Linegraph1").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata1],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: 'Meses',
                title: '',
                yaxislabel: 'Total(und)',

            });
           
        });

    </script>

    <script>
                
        var graphdata2 = {
            linecolor: "yellowgreen",
            title: "Numeros de processos calculados desde 2016",
            values: [
            { X: "2016", Y: <?php echo $ano2016 ?>},
            { X: "2017", Y: <?php echo $ano2017 ?>},
            { X: "2018", Y: <?php echo $ano2018 ?>},
            { X: "2019", Y: <?php echo $ano2019 ?>},
            { X: "2020", Y:<?php echo $ano2020 ?>},
            { X: "2021", Y:<?php echo $ano2021 ?>},
            { X: "2022", Y: <?php echo $ano2022 ?>},
                                   
            ]
        };
             
       
        $(function () {          
                      
            $("#Linegraph2").SimpleChart({
                ChartType: "Bar",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata2],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: 'Meses',
                title: '',
                yaxislabel: 'Total(und)',

            });
           
        });

    </script>

    <script>

        var dez = <?php echo $totalSum ?>
        
        var graphdata3 = {
            linecolor: "blue",
            title: "Custas processuais calculadas",
            values: [
            { X: "Janeiro", Y: <?php echo $janeiroReais ?>},
            { X: "Fevereiro", Y: <?php echo $fevereiroReais ?>},
            { X: "Março", Y: <?php echo $marcoReais ?>},
            { X: "Abril", Y: <?php echo $abrilReais ?>},
            { X: "Maio", Y:<?php echo $maioReais ?>},
            { X: "Junho", Y: <?php echo $junhoReais ?>},
            { X: "Julho", Y: <?php echo $julhoReais ?>},
            { X: "Agosto", Y: <?php echo $agostoReais  ?>},
            { X: "Setembro", Y:<?php echo $setembroReais ?>},
            { X: "Outubro", Y: <?php echo $outubroReais ?>},
            { X: "Novembro", Y: <?php echo $novembroReais ?>},
            { X: "Dezembro", Y: <?php echo $dezembroReais ?>},
                        
            ]
        };
             
       
        $(function () {          
                      
            $("#Linegraph3").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata3],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: 'Meses',
                title: '',
                yaxislabel: 'Totais(milhares) R$',

            });
           
        });

    </script>

    <script>

        var dez = <?php echo $totalSum ?>
        
        var graphdata4 = {
            linecolor: "yellow",
            title: "Custas processuais calculadas",
            values: [
            { X: "2016", Y: <?php echo $ano2016Reais ?>},
            { X: "2017", Y: <?php echo $ano2017Reais ?>},
            { X: "2018", Y: <?php echo $ano2018Reais ?>},
            { X: "2019", Y: <?php echo $ano2019Reais ?>},
            { X: "2020", Y:<?php echo $ano2020Reais ?>},
            { X: "2021", Y:<?php echo $ano2021Reais ?>},
            { X: "2022", Y: <?php echo $ano2022Reais ?>},
                        
            ]
        };
  
       
        $(function () {          
                      
            $("#Linegraph4").SimpleChart({
                ChartType: "Bar",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata4],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: 'Meses',
                title: '',
                yaxislabel: 'Totais(milhares) R$',

            });
           
        });

    </script>