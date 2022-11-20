<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

 ?>

 

<div class="main-page">

    <div class="col_3">

        <a href="index.php?pag=custas_calculos">
            <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-money dollar1 icon-rounded"></i>

                <div align="left" style="margin-top: 10px ;"><span>Custas - Lei antiga</span></div>
            </div>
            </div>
        </a>


        <a href="index.php?pag=home">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-money user1 icon-rounded"></i>

                <div align="left" style="margin-top: 10px ;"><span>Custas - Lei nova</span></div>
            </div>
        </div>
        </a>

    </div>
</div>