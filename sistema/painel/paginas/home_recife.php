<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

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
					<h5><strong>150</strong></h5>
					<span>Cíveis</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-users user1 icon-rounded"></i>
				<div class="stats">
					<h5><strong>360</strong></h5>
					<span>Sucessões</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-users user2 icon-rounded"></i>
				<div class="stats">
					<h5><strong>200</strong></h5>
					<span>Família</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 widget widget1">
			<div class="r3_counter_box">
				<i class="pull-left fa fa-users dollar1 icon-rounded"></i>
				<div class="stats">
					<h5><strong>280</strong></h5>
					<span>Fazenda</span>
				</div>
			</div>
		</div>

	</div>

	<div class="col_3" style="margin-top:15px">
			
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-users dollar1 icon-rounded"></i>
					<div class="stats">
						<h5><strong>590</strong></h5>
						<span>Criminal</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-money dollar1 icon-rounded"></i>
					<div class="stats">
						<h5><strong>650</strong></h5>
						<span>Custas</span>
					</div>
				</div>
			</div>


			<div class="col-md-3 widget">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-users dollar2 icon-rounded"></i>
					<div class="stats">
						<h5><strong>2230</strong></h5>
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
					<h3><strong>Custas</strong></h3>						
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-1" class="pie-title-center" data-percent="29"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="col-md-4 stat">
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h3><strong>Criminal</strong></h3>						
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-2" class="pie-title-center" data-percent="28"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="col-md-4 stat">
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h3><strong>Sucessões</strong></h3>						
				</div>
				<div class="col-md-6 top-content1">	   
					<div id="demo-pie-3" class="pie-title-center" data-percent="16"> <span class="pie-value"></span> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="col-md-2 stat"> </div>

		<div class="clearfix"> </div>

	</div>

	<div class="charts"> </div>		
	
</div>

 <div class="row-one widgettable">

		<div class="col-md-12 content-top-2 card">

			<div class="agileinfo-cdr">
					<div class="card-header">
                        <h3>Custas processuais calculadas (R$)</h3>
                    </div>					
						<div id="Linegraph" style="width: 98%; height: 350px">
						</div>
						
			</div>

		</div>

		<div class="clearfix"> </div>
	</div>


	
	<!-- for amcharts js -->
	<script src="js/amcharts.js"></script>
	<script src="js/serial.js"></script>
	<script src="js/export.min.js"></script>
	<link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
	<script src="js/light.js"></script>
	<!-- for amcharts js -->

	<script  src="js/index1.js"></script>
	

</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>

</div>

</div>



	<script src="js/SimpleChart.js"></script>
    <script>
        
        var graphdata1 = {
            linecolor: "#e32424",
            title: "Custas processuais calculadas",
            values: [
            { X: "Janeiro", Y: 350},
            { X: "Fevereiro", Y: 450},
            { X: "Março", Y: 750},
            { X: "Abril", Y: 500},
            { X: "Maio", Y: 600},
            { X: "Junho", Y: 800 },
            { X: "Julho", Y: 550 },
            { X: "Agosto", Y: 800 },
            { X: "Setembro", Y:720 },
            { X: "Outubro", Y:850 },
            { X: "Novembro", Y: 700},
            { X: "Dezembro", Y: 450 },
                        
            ]
        };

             
       
        $(function () {          
                      
            $("#Linegraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata1],
                legendsize: "30",
                legendposition: 'bottom',
                xaxislabel: 'Meses',
                title: '',
                yaxislabel: 'Totais(mil) R$',

            });
           
        });

    </script>
