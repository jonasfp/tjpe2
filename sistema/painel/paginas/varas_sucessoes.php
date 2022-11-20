<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

 ?>

 

<div class="main-page">

<div class="col_3">

    <a href="index.php?pag=alvaras">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-users icon-rounded"></i>

                <div align="left" style="margin-top: 10px ;"><span>Alvará</span></div>
            </div>
        </div>
    </a>


    <a href="index.php?pag=home">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-users user1 icon-rounded"></i>

                <div align="left" style="margin-top: 10px ;"><span>Arrolamento</span></div>
            </div>
        </div>
    </a>

    <a href="index.php?pag=home">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-users dollar2 icon-rounded"></i>

                <div align="left" style="margin-top: 10px ;"><span>Inventário</span></div>
            </div>
        </div>
    </a>

    
</div>

</div>



