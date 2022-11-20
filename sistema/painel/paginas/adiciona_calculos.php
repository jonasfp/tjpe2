
<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

 ?>


<h3 class="title1">Adicionar cálculos :</h3>
<div class="form-three widget-shadow">
    <form class="form-horizontal">


     <div class="form-group">
         <label for="radio" class="col-sm-2 control-label">Escolha uma opção:</label>
         <div class="col-sm-8">
             <div class="radio-inline"><label><input type="radio"> Cíveis</label></div>
             <div class="radio-inline"><label><input type="radio" > Sucessões</label></div>
             <div class="radio-inline"><label><input type="radio" > Família</label></div>
             <div class="radio-inline"><label><input type="radio" > Fazenda</label></div>
             <div class="radio-inline"><label><input type="radio" > Criminal</label></div>
             <div class="radio-inline"><label><input type="radio" > Custas</label></div>
         </div>
     </div>

     <div class="form-group">
         <label for="selector1" class="col-sm-2 control-label">Selecione a vara:</label>
         <div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>
             <option>Tribunal de Justiça de Pernambuco</option>                                     
         </select></div>
     </div>

     <div class="form-group"> <input type="file" id="exampleInputFile"> </div>

     <div class="form-group"> <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Adicionar</button></div>

 </div>
</form>
</div>

