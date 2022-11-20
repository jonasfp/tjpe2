<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

 ?>
 
<div class=" form-grids row form-grids-right">
    <div class="widget-shadow " data-example-id="basic-forms"> 
        <div class="form-title">
            <h4>Pesquisar :</h4>
        </div>
        <div class="form-body">
            <form class="form-horizontal"> 

                <div class="form-group"> <label class="col-sm-2 control-label">Matricula:</label> <div class="col-sm-3"> <input type="text" class="form-control" id="inputPassword3" placeholder="Matricula" > </div> </div>

                <div class="form-group">
                    <label for="datetimepicker6" class="col-sm-2 control-label">Escolha o período:</label>
                    <div class='col-md-2'>
                      <div class="form-group">
                       <div class='input-group date' id='datetimepicker6'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-md-2'>
              <div class="form-group">
               <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 $(function () {
     $('#datetimepicker6').datetimepicker();
     $('#datetimepicker7').datetimepicker({
               useCurrent: false //Important! See issue #1075
           });
     $("#datetimepicker6").on("dp.change", function (e) {
         $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
     });
     $("#datetimepicker7").on("dp.change", function (e) {
         $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
     });
 });
</script>                                

<div class="form-group"> <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Pesquisar</button></div></div>

</form> 
</div>
</div>
</div>
