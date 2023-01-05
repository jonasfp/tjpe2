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

$civeis = 480;
$sucessoes = 412;
$familia = 454;
$fazenda = 215;
$criminal = 588;
$custas = 320+$total_reg;
$total = $civeis+$sucessoes+$familia+$fazenda+$criminal+$custas;
$percentualCriminal = ($criminal/$total)*100;
$percentualCustas = ($custas/$total)*100;
$percentualCiveis = ($civeis/$total)*100;


$janeiroQtde = 202; 
$fevereiroQtde = 140; 
$marcoQtde = 260; 
$abrilQtde = 250; 
$maioQtde = 164; 
$junhoQtde = 231; 
$julhoQtde = 168; 
$agostoQtde = 230; 
$setembroQtde = 235; 
$outubroQtde = 201; 
$novembroQtde = 238; 
$dezembroQtde = 148+$total_reg;

 

?>

<div style="margin-bottom:20px">
<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div>
<div style="margin-bottom:10px;"><h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3></div>     

<h4 style="text-align:center">RECIFE</h4>
</div>


<div class="main-page">

	<div class="col_3">
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-users icon-rounded"></i>
				<div class="stats">
					<h5><strong><?php echo $civeis ?></strong></h5>
					<span>Cíveis</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-users user1 icon-rounded"></i>
				<div class="stats">
					<h5><strong><?php echo $sucessoes ?></strong></h5>
					<span>Sucessões</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-users user2 icon-rounded"></i>
				<div class="stats">
					<h5><strong><?php echo $familia ?></strong></h5>
					<span>Família</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-users dollar1 icon-rounded"></i>
				<div class="stats">
					<h5><strong><?php echo $fazenda ?></strong></h5>
					<span>Fazenda</span>
				</div>
			</div>
		</div>

	</div>

	<div class="col_3">
			
			<div class="col-md-3 widget widget1" style="margin-top:15px">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-users dollar1 icon-rounded"></i>
					<div class="stats">
						<h5><strong><?php echo $criminal ?></strong></h5>
						<span>Criminal</span>
					</div>
				</div>
			</div>

			
		<a href="index.php?pag=dashboard_recife_custas">
			<div class="col-md-3 widget widget1" style="margin-top:15px">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-money dollar1 icon-rounded"></i>
					<div class="stats">
						<h5><strong><?php echo $custas ?></strong></h5>
						<span>Custas</span>
					</div>
				</div>
			</div>
		</a>


			<div class="col-md-3 widget" style="margin-top:15px">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-users dollar2 icon-rounded"></i>
					<div class="stats">
						<h5><strong><?php echo $total?></strong></h5>
						<span>Total Realizado</span>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>


		</div>

	
	<div class="row" style="margin-top: 20px">
		
		<div class="col-md-4 stat">
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h3><strong>Criminal</strong></h3>						
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-1" class="pie-title-center" data-percent="<?php echo $percentualCriminal; ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		
		<div class="col-md-4 stat">
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h3><strong>Cíveis</strong></h3>						
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-3" class="pie-title-center" data-percent="<?php echo $percentualCiveis  ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="col-md-4 stat">
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h3><strong>Custas</strong></h3>						
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-2" class="pie-title-center" data-percent="<?php echo $percentualCustas  ?>"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>


	</div>
		
</div>

 
<div class="row-one widgettable">
		<div class="col-md-12 content-top-2 card">

			<div class="agileinfo-cdr">
					<div class="card-header">
                        <h3>Processos calculados em 2022</h3>
                    </div>					
					<div id="Linegraph2" style="width: 98%; height: 350px">
					</div>						
			</div>
		</div>		
</div>

<script src="js/SimpleChart.js"></script>
	
   
    <script>
    	        
        var graphdata2 = {
            linecolor: "#e32424",
            title: "Numeros de processos calculados em 2022",
            values: [
            { X: "Janeiro", Y: <?php echo $janeiroQtde  ?>},
            { X: "Fevereiro", Y: <?php echo $fevereiroQtde ?> },
            { X: "Março", Y: <?php echo $marcoQtde ?>},
            { X: "Abril", Y: <?php echo $abrilQtde ?>},
            { X: "Maio", Y: <?php echo $maioQtde ?> },
            { X: "Junho", Y: <?php echo $junhoQtde ?>},
            { X: "Julho", Y: <?php echo $julhoQtde ?>},
            { X: "Agosto", Y: <?php echo $agostoQtde ?>},
            { X: "Setembro", Y: <?php echo $setembroQtde ?>},
            { X: "Outubro", Y: <?php echo $novembroQtde ?>},
            { X: "Novembro", Y: <?php echo $novembroQtde ?>},
            { X: "Dezembro", Y: <?php echo $dezembroQtde ?>},
                        
            ]
        };

            
       
        $(function () {          
                      
            $("#Linegraph2").SimpleChart({
                ChartType: "Line",
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