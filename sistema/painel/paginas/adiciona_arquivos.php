<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

 ?>


<h3 class="title1">Adicionar arquivos :</h3>

<div class="form-three widget-shadow">

    <form class="form-horizontal">                            

        <div class="form-group">

            <label for="selector1" class="col-sm-2 control-label">Selecione o arquivo:</label>

            <div class="col-sm-8"> <select name="selector1" id="selector1" class="form-control1">

                <option>Atos</option>
                <option>Instruções</option>
                <option>Planilhas</option>
                <option>Certidões</option>

            </select> </div>

        </div>

        <div class="form-group"> <input type="file" id="exampleInputFile"> </div>

        <div class="form-group"> <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Adicionar</button></div>

    </div>

    </form>

</div>