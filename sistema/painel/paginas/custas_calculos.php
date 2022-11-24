<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

$pag = 'modulo_custas';

?>

<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script src='https://momentjs.com/downloads/moment.min.js'></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="css/relatorio.css">


<!--**********************Tabela dados do processo***************************-->
<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div>
<h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3>


<h4 style="text-align:center">CONTADORIA</h4>
<h5 style="text-align:center; margin-bottom: 3.0em;">FORUM DES. RODOLFO AURELIANO - AV. DES. GUERRA BARRETO, S/N - ILHA DO LEITE - RECIFE /PE</h5>                

<form method="post" id="formCustasProcesso" name="formCustasProcesso">

    <table class="table table-hover">
        <thead>
            <tr>
              <th class="text-left fonte-print">NÚMERO DO PROCESSO </th>
              <th class="text-left fonte-print" style="width:15%">VARA</th>    <th class="text-left fonte-print" style="width:30%">DEVEDOR(ES)</th>
              <th class="text-left fonte-print" style="width:3%">AÇÃO</th>             
          </tr>
      </thead>

      <tbody>
        <tr>
            <td>       

                <input type="text" class="form-control" id="processo" name="processo" placeholder="Número do processo">             
            </td>

            <td>

                <div class="form-group">
                    <select class="form-control sel2" id="vara" name="vara" style="width:100%;" > 

                        <?php 
                        $query = $pdo->query("SELECT * FROM vara ORDER BY id asc");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        $total_reg = @count($res);
                        if($total_reg > 0){
                            for($i=0; $i < 30; $i++){
                                foreach ($res[$i] as $key => $value){}
                                    echo '<option value="'.$res[$i]['id'].'">'.$res[$i]['nome'].'</option>';
                            }
                        }else{
                                           // echo '<option value="0">Cadastre uma Categoria</option>';
                        }
                        ?>


                    </select>   
                </div>  


            </td>

            <td>

                <input type="text" class="form-control" id="devedores" name="devedores" placeholder="Devedor">             
            </td>

            <td>               
                <button type="submit" id="salvarLinhaprocesso" name="salvarLinhaprocesso" class="salvarLinhaprocesso"><i class="fa fa-save" title="Salvar linha"></i></button>
                

            </td>

        </tr>   

    </tbody>
</table>

</form>

<!--**********************Tabela Parâmetros****************************-->

<form method="post" id="formCustasParametros" name="formCustasParametros">

   <table class="table table-hover" >
    <thead>
        <tr>
          <th class="text-left fonte-print">CORREÇÃO MONETÁRIA </th>     
          <th class="text-left fonte-print" style="width: 17%;">TERMO FINAL</th>          
          <th class="text-left fonte-print" style="width:3%">AÇÃO</th>
      </tr>
  </thead>
  
  <tbody>            

    <tr>
        <td>
         <div class="form-group">
            <select class="form-control sel2" id="selectindicecorrecao" name="selectindicecorrecao" style="width:100%;" > 

                <?php 
                $query = $pdo->query("SELECT * FROM indices_correcao ORDER BY id asc");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                $total_reg = @count($res);
                if($total_reg > 0){
                    for($i=0; $i < $total_reg; $i++){
                        foreach ($res[$i] as $key => $value){}
                            echo '<option value="'.$res[$i]['id'].'">'.$res[$i]['nomeindice'].'</option>';
                    }
                }else{
                                           // echo '<option value="0">Cadastre uma Categoria</option>';
                }
                ?>

            </select>   
        </div>  

    </td>

    <td>
        <div>
            <input placeholder="Data final" type="text" id="datafinalcorrecao" name="datafinalcorrecao" class="form-control"></div>   

        </td>

        <td>                    
            <button type="submit" id="salvarLinhaParametrosCustas" name="salvarLinhaParametrosCustas" class="salvarLinhaParametros"><i class="fa fa-save" title="Salvar linha"></i></button>
            
        </td>            

    </tr>

</tbody>

</table>

</form>

<!--**********************Tabela custas calculadas**********************-->

<form method="post" id="formCustasCalculadas" name="formCustasCalculadas">

    <table class="table table-hover" id="jonas">
        <thead>
            <tr>
              <th class="text-left fonte-print" style="width:14%" >CALCULADAS/PAGAS</th>
              <th class="text-left fonte-print" style="width:7%">DATA</th>
              <th class="text-left fonte-print">HISTÓRICO</th>  
              <th class="text-left fonte-print" style="width:10%">CUSTAS PROCESSUAIS</th>
              <th class="text-left fonte-print" style="width:10%">TAXA JUDICIÁRIA</th>
              <th class="text-left fonte-print" style="width:10%">CUSTAS ATUALIZADAS</th>
              <th class="text-left fonte-print" style="width:10%">TAXA ATUALIZADA</th>              
              <th class="text-left fonte-print" style="width:10%">TOTAL (R$)</th>
              <th class="text-center no-print fonte-print" style="width:3%">AÇÃO</th>

          </tr>
      </thead>

      <tbody id="modelo-linha">

        <tr class="linha-lancamento">  

            <td>

                <form>
                   <select id="selecttipocustas" name="selecttipocustas" class="form-control">
                    <option value="Sem custas">SEM CUSTAS</option>                               
                    <option value="2º grau">CUSTAS DO 2º GRAU</option>
                    <option value="Contadoria">CONTADORIA</option>
                    <option value="Diversas">PAGAS</option>          
                </select>

            </form>
        </td>

        <td>

            <input placeholder="Data" type="text" id="dataeventocustascalculadas" name="dataeventocustascalculadas" class="form-control">

        </td>

        <td>

            <input placeholder="Histórico" type="text" id="historicocustascalculadas" name="historicocustascalculadas" class="form-control">

        </td>

        <td>

            <input type="text" class="form-control" id="custasprocessuaiscalculadas" name="custasprocessuaiscalculadas" placeholder="Custas processuais" onkeyup="somenteNumeros(this)">             
        </td>

        <td>

            <input type="text" class="form-control" id="taxajudiciariacalculada" name="taxajudiciariacalculada" placeholder="Valor" onkeyup="somenteNumeros(this)">             
        </td>

        <td>

            <input type="text" class="form-control" id="custasprocessuaisatualizadas" name="custasprocessuaisatualizadas" placeholder="Custas processuais">             
        </td>

        <td>

            <input type="text" class="form-control" id="taxajudiciariaatualizada" name="taxajudiciariaatualizada" placeholder="Taxa judiciaria">     
        </td>

        <td>

            <input type="text" class="form-control" id="totalcustascalculadasatualizadas" name="totalcustascalculadasatualizadas" placeholder="Total">             
        </td>

        <td>                
            <button type="submit" id="inserirLinhaCustasCalculadas" name="inserirLinhaCustasCalculadas"><i class="fa fa-plus" aria-hidden="true" title="Inserir linha"></i></button>

        </td>            

    </tbody>

</table>

</form>

<!--**************************Tabela Custas/Taxas**************************-->

<form method="post" id="formCustasTaxa" name="formCustasTaxa">

    <table class="table table-hover" id="jonas">
        <thead>
            <tr>
              <th class="text-left fonte-print" style="width:14%">DEVIDAS</th>  
              <th class="text-left fonte-print" style="width:7%">DATA</th>
              <th class="text-left fonte-print">HISTÓRICO</th>
              <th class="text-left fonte-print" style="width:10%">VALOR BASE (R$)</th>
              <th class="text-left fonte-print" style="width:10%">CUSTAS PROCESSUAIS</th>
              <th class="text-left fonte-print" style="width:10%">TAXA JUDICIÁRIA</th>
              <th class="text-left fonte-print" style="width:10%">TOTAL (R$)</th>
              <th class="text-center no-print fonte-print" style="width:3%">AÇÃO</th>

          </tr>
      </thead>



      <tbody id="modelo-linha">

        <tr class="linha-lancamento">  

            <td>

                <form>

                   <select id="selectcustastaxa" name="selectcustastaxa" class="form-control">
                    <option value="Sem custas">SEM CUSTAS</option>
                    <option value="Iniciais">CUSTAS INICIAIS</option>
                    <option value="Cump. Sentença">CUMPRIMENTO DE SENTENÇA</option>
                    <option value="Reconvenção">RECONVENÇÃO</option>
                    <option value="Denunciação">DENUNCIAÇÃO DA LIDE</option>
                    <option value="Diversas">DIVERSAS</option>                              

                </select>

            </form>


        </td>


        <td>

            <input placeholder="Data" type="text" id="dataeventocustastaxa" name="dataeventocustastaxa" class="form-control">

        </td>

        <td>

            <input type="text" class="form-control" id="historicocustastaxa" name="historicocustastaxa" placeholder="Histórico">             
        </td>

        <td>

            <input type="text" class="form-control" id="valorcustastaxa" name="valorcustastaxa" placeholder="Valor"  onkeyup="somenteNumeros(this)">             
        </td>

        <td>

            <input type="text" class="form-control" id="custasprocessuaiscustastaxa" name="custasprocessuaiscustastaxa" placeholder="Custas processuais">             
        </td>

        <td>

            <input type="text" class="form-control" id="taxajudiciariacustastaxa" name="taxajudiciariacustastaxa" placeholder="Taxa judiciaria">     
        </td>


        <td>

            <input type="text" class="form-control" id="totalcustastaxa" name="totalcustastaxa" placeholder="Total">             
        </td>

        <td>

            <button type="submit" id="inserirLinhatotalcustastaxa" name="inserirLinhatotalcustastaxa"><i class="fa fa-plus" aria-hidden="true" title="Inserir linha"></i></button>

        </td>            

    </tbody>

</table>

</form>

<!--**************************Tabela Embargos*******************************-->

<form method="post" id="formCustasEmbargos" name="formCustasEmbargos">

    <table class="table table-hover" id="jonas">
        <thead>
            <tr>
              <th class="text-left fonte-print" style="width:14%">EMBARGOS</th>  
              <th class="text-left fonte-print" style="width:7%">DATA</th>
              <th class="text-left fonte-print">HISTÓRICO</th>
              <th class="text-left fonte-print" style="width:11%">VALOR DA EXECUÇÃO(R$)</th>
              <th class="text-left fonte-print" style="width:10%">PERCENTUAL(%) (R$)</th>
              <th class="text-left fonte-print" style="width:10%">CUSTAS PROCESSUAIS</th>
              <th class="text-left fonte-print" style="width:10%">TAXA JUDICIÁRIA</th>
              <th class="text-left fonte-print" style="width:10%">TOTAL (R$)</th>
              <th class="text-center no-print fonte-print" style="width:3%">AÇÃO</th>

          </tr>
      </thead>



      <tbody id="modelo-linha">

        <tr class="linha-lancamento">  

            <td>

                   <select id="selecttipoembargos" name="selecttipoembargos" class="form-control">
                    <option value="Sem custas">SEM CUSTAS</option>                             
                    <option value="Devedor">EMBARGOS DE DEVEDOR</option>
                    <option value="Terceiros">EMBARGOS DE TERCEIROS</option>

                </select>

      
        </td>


        <td>

            <input placeholder="Data" type="text" id="dataeventoembargos" name="dataeventoembargos" class="form-control">

        </td>

        <td>

            <input type="text" class="form-control" id="historicoembargos" name="historicoembargos" placeholder="Histórico">             
        </td>

        <td>

            <input type="text" class="form-control" id="valorembargos" name="valorembargos" placeholder="Valor"  onkeyup="somenteNumeros(this)">             
        </td>

        <td>
         
               <select id="selectpercentualembargos" name="selectpercentualembargos" class="form-control">

                   <option value="Sem custas">Percentual(%)</option>
                   <option value="0,3">0,3%</option>
                   <option value="0,7">0,7%</option>
                   <option value="1,0">1,0%</option>                            
                </select>

       </td>


       <td>

        <input type="text" class="form-control" id="custasprocessuaisembargos" name="custasprocessuaisembargos" placeholder="Custas processuais">             
    </td>

    <td>

        <input type="text" class="form-control" id="taxajudiciariaembargos" name="taxajudiciariaembargos" placeholder="Taxa judiciaria">     
    </td>


    <td>

        <input type="text" class="form-control" id="totalembargos" name="totalembargos" placeholder="Total">             
    </td>

    <td>

        <button type="submit" id="inserirLinhatotalembargos" name="inserirLinhatotalembargos"><i class="fa fa-plus" aria-hidden="true" title="Inserir linha"></i></button>

    </td>            

</tbody>

</table>

</form>

<!--*******************Tabela custas/despesas extras************************-->


<form method="post" id="formCustasExtras" name="formCustasExtras">

    <table class="table table-hover" id="jonas">
        <thead>
            <tr>
              <th class="text-left fonte-print" style="width:14%">EXTRAS/DESPESAS</th>  
              <th class="text-left fonte-print" style="width:7%">DATA</th>
              <th class="text-left fonte-print">HISTÓRICO</th>
              <th class="text-left fonte-print" style="width:10%">QUANTIDADE</th>
              <th class="text-left fonte-print" style="width:10%">VALOR UNITÁRIO</th>                
              <th class="text-left fonte-print" style="width:10%">TOTAL (R$)</th>
              <th class="text-center no-print fonte-print" style="width:3%">AÇÃO</th>

          </tr>
      </thead>



      <tbody id="modelo-linha">

        <tr class="linha-lancamento">  

            <td>

                   <select id="selectcustasdespesasextras" name="selectcustasdespesasextras" class="form-control">

                      <option value="Sem custas">SEM CUSTAS/DESPESAS</option>
                      <option value="Certidão">EXPEDIÇÃO DE CERTIDÃO</option>
                      <option value="Informações">OBTENÇÃO DE INFORMAÇÕES (SISBAJUD, RENAJUD...)</option>
                      <option value="Bloqueio">EXP. ALVARÁ, MANDADO E OFÍCIO (PARA BLOQUEIO)</option>
                      <option value="Publicação">PUBLICAÇÃO DE EDITAL</option>
                      <option value="Porte">PORTE DE REMESSA E DE RETORNO</option>
                      <option value="Citação/Intimação">CITAÇÕES E INTIMAÇÕES</option>
                      <option value="Carta precatória">CARTA PRECATORIA</option>
                      <option value="Carta rogatória">CARTA ROGATORIA</option>
                      <option value="Carta de ordem">CARTA DE ORDEM</option>


                  </select>
             

          </td>


          <td>

            <input placeholder="Data" type="text" id="dataeventoextras" name="dataeventoextras" class="form-control" disabled>

        </td>

        <td>

            <input type="text" class="form-control" id="historicoextras" name="historicoextras" placeholder="Histórico">             
        </td>

        <td>

            <input type="text" class="form-control" id="quantidadeextras" name="quantidadeextras" placeholder="Quantidade"  onkeyup="somenteNumeros(this)">             
        </td>

        <td>

            <input type="text" class="form-control" id="valorextras" name="valorextras" placeholder="Valor">             
        </td>


        <td>

            <input type="text" class="form-control" id="totalextras" name="totalextras" placeholder="Total">             
        </td>

        <td>

            <button type="submit" id="inserirLinhaExtras" name="inserirLinhaExtras"><i class="fa fa-plus" aria-hidden="true" title="Inserir linha"></i></button>

        </td>            

    </tbody>

</table>

</form>



<div align="center" style="margin-top:2.0em; margin-bottom:2.0em ;">
    <!--
    <label for="exibir" style="margin-bottom: 1.0em; margin-right:20.4em;color: red;font-weight: bold; width:14%"> SUBTOTAL:</label>

    <input id="exibir" class = "form-control" style="margin-bottom: 1.0em; margin-right:12.3em;color: red;font-weight: bold; width:14%">
-->

<!--

<form class="form-inline">

<div class="form-group">
      <label for="exibirtotaldevidocustas">CUSTAS PROCESSUAIS(R$):</label>
      <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control" id="exibirtotaldevidocustas" name="exibirtotaldevidocustas" placeholder="" disabled>
  </div> 


  <div class="form-group">
      <label for="exibirtotaldevidotaxa">TAXAS JUDICIARIAS(R$):</label>
      <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control" id="exibirtotaldevidotaxa" name="exibirtotaldevidotaxa" placeholder="" disabled>
  </div>

   <div class="form-group">
      <label for="exibirtotaldevidodespesas">DESPESAS PROCESSUAIS(R$):</label>
      <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control" id="exibirtotaldevidodesepesas" name="exibirtotaldevidodespesas" placeholder="" disabled>
  </div>  



    <div class="form-group">
      <label for="exibirtotaldevidocustastaxas">TOTAL DEVIDO(R$):</label>
      <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control" id="exibirtotaldevidocustastaxas" name="exibirtotaldevidocustastaxas" placeholder="" disabled>
  </div>    
</form>

-->

</div>



<!--********************************************************************--> 


<input type="hidden" name = "id">

<small><div id="mensagem" align="center"></div></small>               

<div class="modal-footer">
<!--
    <a href="index.php?pag=lista_custas"> <button id="editartudo" class="btn btn-primary">Editar</button></a> 

    <a href="../rel/modulo_custas.php" target="_blank"><button id="salvartudo" class="btn btn-primary">Imprimir</button></a> -->


</div>


                

<!--**********************Scripts*************************************-->

<?php 

$query = $pdo->query("SELECT encoge, DATE_FORMAT(data,'%d-%m-%Y') AS nicedata FROM indice_encoge");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

$indice = array();

if($total_reg > 0){

    for($i=0; $i<$total_reg; $i++){
        foreach ($res[$i] as $key => $value){

            $data = $res[$i]['nicedata'];
            $encoge = $res[$i]['encoge'];
            $indice[$data] = $encoge;
        }
    }
}

?>



<script type="text/javascript">

    $(document).ready(function(){


//inclusão de datapickers nos eventos de datas

$("#datafinalcorrecao,#dataeventocustastaxa,#dataeventoextras,#dataeventocustascalculadas,#dataeventoembargos").datepicker({
    changeMonth: true,
    changeYear: true,
    firstDay: 1,           
    dateFormat: 'dd-mm-yy',   
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
})

/**********************************************************************/

//Função que define os campos visíveis ou não das custas calculadas

$('#dataeventocustascalculadas').attr("readonly",true)
$('#dataeventocustascalculadas').attr("disabled",true)
$('#historicocustascalculadas').attr("readonly",true)
$('#custasprocessuaiscalculadas').attr("readonly",true)
$('#taxajudiciariacalculada').attr("readonly",true)
$('#custasprocessuaisatualizadas').attr("readonly",true)
$('#taxajudiciariaatualizada').attr("readonly",true)
$('#totalcustascalculadasatualizadas').attr("readonly",true)


$('#selecttipocustas').change(function(){

    var tipocustascalculadas = document.getElementById('selecttipocustas').value

    if(tipocustascalculadas=="Sem custas"){

        $('#dataeventocustascalculadas').attr("readonly",true)
        $('#dataeventocustascalculadas').attr("disabled",true)
        $('#historicocustascalculadas').attr("readonly",true)
        $('#custasprocessuaiscalculadas').attr("readonly",true)
        $('#taxajudiciariacalculada').attr("readonly",true)
        $('#dataeventocustascalculadas').val("")
        $('#historicocustascalculadas').val("")
        $('#custasprocessuaiscalculadas').val("")
        $('#taxajudiciariacalculada').val("")
        $('#dataeventocustascalculadas').val("")
        $('#custasprocessuaiscalculadas').val("")
        $('#taxajudiciariacalculada').val("")


    } else{

        $('#dataeventocustascalculadas').attr("readonly",false)
        $('#dataeventocustascalculadas').attr("disabled",false)
        $('#historicocustascalculadas').attr("readonly",false)
        $('#custasprocessuaiscalculadas').attr("readonly",false)
        $('#taxajudiciariacalculada').attr("readonly",false)

    } 

})

/**********************************************************************/

//Função que define os campos visíveis ou não das custas/taxas

$('#dataeventocustastaxa').attr("readonly",true)
$('#dataeventocustastaxa').attr("disabled",true)
$('#historicocustastaxa').attr("readonly",true)
$('#valorcustastaxa').attr("readonly",true)
$('#custasprocessuaiscustastaxa').attr("readonly",true)
$('#taxajudiciariacustastaxa').attr("readonly",true)
$('#totalcustastaxa').attr("readonly",true)


$('#selectcustastaxa').change(function(){

    var tipocustastaxas = document.getElementById('selectcustastaxa').value

    if(tipocustastaxas =="Sem custas"){

        $('#dataeventocustastaxa').attr("readonly",true)
        $('#dataeventocustastaxa').attr("disabled",true)
        $('#historicocustastaxa').attr("readonly",true)
        $('#valorcustastaxa').attr("readonly",true)
        $('#custasprocessuaiscustastaxa').attr("readonly",true)
        $('#taxajudiciariacustastaxa').attr("readonly",true)
        $('#totalcustastaxa').attr("readonly",true)
        $('#dataeventocustastaxa').val("")
        $('#historicocustastaxa').val("")
        $('#valorcustastaxa').val("")
        $('#custasprocessuaiscustastaxa').val("")
        $('#taxajudiciariacustastaxa').val("")
        $('#totalcustastaxa').val("")


    } else{

        $('#dataeventocustastaxa').attr("readonly",false)
        $('#dataeventocustastaxa').attr("disabled",false)
        $('#historicocustastaxa').attr("readonly",false)
        $('#valorcustastaxa').attr("readonly",false)

    } 

})

/**********************************************************************/

//Função que define os campos visíveis dos embargos

$('#dataeventoembargos').attr("readonly",true)
$('#dataeventoembargos').attr("disabled",true)
$('#historicoembargos').attr("readonly",true)
$('#valorembargos').attr("readonly",true)
$('#selectpercentualembargos').attr("readonly",true)
$('#selectpercentualembargos').attr("disabled",true)
$('#custasprocessuaisembargos').attr("readonly",true)
$('#taxajudiciariaembargos').attr("readonly",true)
$('#totalembargos').attr("readonly",true)



$('#selecttipoembargos').change(function(){

    var tipoembargos = document.getElementById('selecttipoembargos').value

    if(tipoembargos =="Sem custas"){

        $('#dataeventoembargos').attr("readonly",true)
        $('#dataeventoembargos').attr("disabled",true)
        $('#historicoembargos').attr("readonly",true)
        $('#valorembargos').attr("readonly",true)
        $('#selectpercentualembargos').attr("readonly",true)
        $('#selectpercentualembargos').attr("disabled",true)
        $('#custasprocessuaisembargos').attr("readonly",true)
        $('#taxajudiciariaembargos').attr("readonly",true)
        $('#totalembargos').attr("readonly",true)
        $('#dataeventoembargos').val("")
        $('#historicoembargos').val("")
        $('#valorembargos').val("")
        $('#custasprocessuaisembargos').val("")
        $('#taxajudiciariaembargos').val("")
        $('#totalembargos').val("")

    } else{


        $('#dataeventoembargos').attr("readonly",false)
        $('#dataeventoembargos').attr("disabled",false)
        $('#historicoembargos').attr("readonly",false)
        $('#valorembargos').attr("readonly",false)
        $('#selectpercentualembargos').attr("readonly",false)
        $('#selectpercentualembargos').attr("disabled",false)

    } 

})

/**********************************************************************/

//Função que define os campos visíveis ou não das custas/despesas extras

$('#dataeventoextras').attr("readonly",true)
$('#dataeventoextras').attr("disabled",true)
$('#historicoextras').attr("readonly",true)
$('#valorextras').attr("readonly",true)
$('#quantidadeextras').attr("readonly",true)
$('#totalextras').attr("readonly",true)

$('#selectcustasdespesasextras').change(function(){

    var tipocustasdepesasextras = document.getElementById('selectcustasdespesasextras').value

    if(tipocustasdepesasextras =="Sem custas"){

        $("#dataeventoextras").attr('disabled',true)
        $('#historicoextras').attr("readonly",true)
        $('#quantidadeextras').attr("readonly",true)
        $('#valorextras').attr("readonly",true)
        $('#totalextras').attr("readonly",true)
        $('#dataeventoextras').val("")
        $('#historicoextras').val("")
        $('#quantidadeextras').val("")
        $('#valorextras').val("")
        $('#totalextras').val("")



    } else{

        $("#dataeventoextras").attr("readonly",false)
        $("#dataeventoextras").attr('disabled',false)
        $('#historicoextras').attr("readonly",false)
        $('#valorextras').attr("readonly",true)
        $('#quantidadeextras').attr("readonly",false)


    } 

})


/**********************************************************************/

var jsonJS = <?php echo json_encode($indice)?>


/**************************************************************************/

//função que atualiza as custas calculadas pelo 2º grau/contadoria/diversas

$('#dataeventocustascalculadas,#datafinalcorrecao,#custasprocessuaiscalculadas,#taxajudiciariacalculada').change(function(){

    var end = $('#datafinalcorrecao').datepicker().val()
    var endCorrecaoMonetaria = end.replace(/(\d*)-(\d*)-(\d*).*/, '01-$2-$3')  
    var start = $('#dataeventocustascalculadas').datepicker().val()
    var startCorrecaoMonetaria = start.replace(/(\d*)-(\d*)-(\d*).*/, '01-$2-$3')    
    var valorEnd = parseFloat(jsonJS[endCorrecaoMonetaria])
    var valorStart = parseFloat(jsonJS[startCorrecaoMonetaria])
    var result = (valorStart/valorEnd).toFixed(7)    
    var valorCustasProcessuaisCalculadas = parseFloat($('#custasprocessuaiscalculadas').val())
    var valorTaxaJudiciariaCalculada = parseFloat($('#taxajudiciariacalculada').val())
    var totalCustasProcessuaisCalculadas = valorCustasProcessuaisCalculadas*result
    var totalTaxaJudiciariaCalculada= valorTaxaJudiciariaCalculada*result

    if(isNaN(totalCustasProcessuaisCalculadas) || isNaN(totalTaxaJudiciariaCalculada)){

      $('#custasprocessuaisatualizadas').val('')
      $('#taxajudiciariaatualizada').val('')
      $('#totalcustascalculadasatualizadas').val('')  

  } else{

    $('#custasprocessuaisatualizadas').val(totalCustasProcessuaisCalculadas.toFixed(2))
    $('#taxajudiciariaatualizada').val(totalTaxaJudiciariaCalculada.toFixed(2))
    
    parseFloat($('#custasprocessuaisatualizadas').val())
    parseFloat($('#taxajudiciariaatualizada').val())
    
    $('#totalcustascalculadasatualizadas').val(parseFloat($('#custasprocessuaisatualizadas').val())+
        parseFloat($('#taxajudiciariaatualizada').val()))
    
}    

})

/****************************************************************************/

//função que calculas as custas/taxas

$('#dataeventocustastaxa,#datafinalcorrecao,#valorcustastaxa').change(function(){

    var end = $('#datafinalcorrecao').datepicker().val()
    var endCorrecaoMonetaria = end.replace(/(\d*)-(\d*)-(\d*).*/, '01-$2-$3') 
    var start = $('#dataeventocustastaxa').datepicker().val()
    var startCorrecaoMonetaria = start.replace(/(\d*)-(\d*)-(\d*).*/, '01-$2-$3') 
    var dataFormatada = start.replace(/(\d*)-(\d*)-(\d*).*/, '$3-$2-$1')
    var startformatado = moment(dataFormatada).format('YYYY-MM-DD')
    
    var valorEnd = parseFloat(jsonJS[endCorrecaoMonetaria])
    var valorStart = parseFloat(jsonJS[startCorrecaoMonetaria])
    var result = (valorStart/valorEnd).toFixed(7)
    var valorcausacustastaxa = parseFloat($('#valorcustastaxa').val())    
    var valorcausacustastaxaatualizado = valorcausacustastaxa*result
    var custasprocessuaiscustastaxa
    var taxajudiciariacustastaxa
    

    if(moment(startformatado).isBefore('2021-03-05')){

        custasprocessuaiscustastaxa = 176.26 + 0.008 * valorcausacustastaxaatualizado    
        taxajudiciariacustastaxa = 0.01 * valorcausacustastaxaatualizado

        if (taxajudiciariacustastaxa < 36.68) {

            taxajudiciariacustastaxa = 36.68

        }

    } else {

        custasprocessuaiscustastaxa = 0.01 * valorcausacustastaxaatualizado    
        taxajudiciariacustastaxa = 0.01 * valorcausacustastaxaatualizado

        if (custasprocessuaiscustastaxa < 176.26){

            custasprocessuaiscustastaxa = 176.26
        } 

        if (taxajudiciariacustastaxa < 36.68){

            taxajudiciariacustastaxa = 36.68
        } 
    }
    
    if(isNaN(custasprocessuaiscustastaxa) || isNaN(taxajudiciariacustastaxa)){

      $('#custasprocessuaiscustastaxa').val('')
      $('#taxajudiciariacustastaxa').val('')
      $('#totalcustastaxa').val('')  

    } else{

    $('#custasprocessuaiscustastaxa').val(custasprocessuaiscustastaxa.toFixed(2))
    $('#taxajudiciariacustastaxa').val(taxajudiciariacustastaxa.toFixed(2))

    var somatotalcustastaxa = parseFloat($('#custasprocessuaiscustastaxa').val()) + parseFloat($('#taxajudiciariacustastaxa').val())
    
    $('#totalcustastaxa').val(somatotalcustastaxa.toFixed(2))
    
}    

})

/****************************************************************************/

//função que calculas as embargos do devedor e de terceiros

$('#dataeventoembargos,#datafinalcorrecao,#valorembargos,#selectpercentualembargos').change(function(){

    var end = $('#datafinalcorrecao').datepicker().val()
    var endCorrecaoMonetaria = end.replace(/(\d*)-(\d*)-(\d*).*/, '01-$2-$3')
    var start = $('#dataeventoembargos').datepicker().val()
    var startCorrecaoMonetaria = start.replace(/(\d*)-(\d*)-(\d*).*/, '01-$2-$3')
    var dataFormatada = start.replace(/(\d*)-(\d*)-(\d*).*/, '$3-$2-$1');
    var startformatado = moment(dataFormatada).format('YYYY-MM-DD')
    
    var valorEnd = parseFloat(jsonJS[endCorrecaoMonetaria])
    var valorStart = parseFloat(jsonJS[startCorrecaoMonetaria])
    var result = (valorStart/valorEnd).toFixed(7)
    var valorcausaembargos = parseFloat($('#valorembargos').val())    
    var valorcausaembargosatualizado = valorcausaembargos*result    
    var custasprocessuaisembargos
    var taxajudiciariaembargos
    var selectpercentualembargos = document.getElementById('selectpercentualembargos').value   

    if(moment(startformatado).isBefore('2021-03-05') && selectpercentualembargos =='0,3'){

        custasprocessuaisembargos = 176.26 + 0.008 * valorcausaembargosatualizado
        taxajudiciariaembargos = 0.003 * valorcausaembargosatualizado

        if (taxajudiciariaembargos < 36.68 * 0.3) {

            taxajudiciariaembargos = 36.68 * 0.3

        }

    } else if (moment(startformatado).isBefore('2021-03-05') && selectpercentualembargos =='0,7') {

        custasprocessuaisembargos = 176.26 + 0.008 * valorcausaembargosatualizado
        taxajudiciariaembargos = 0.007 * valorcausaembargosatualizado

        if (taxajudiciariaembargos < 36.68 * 0.7) {

            taxajudiciariaembargos = 36.68 * 0.7

        }  


    } else if (moment(startformatado).isBefore('2021-03-05') && selectpercentualembargos =='1,0') {

        custasprocessuaisembargos = 176.26 + 0.008 * valorcausaembargosatualizado
        taxajudiciariaembargos = 0.01 * valorcausaembargosatualizado

        if (taxajudiciariaembargos < 36.68 ) {

            taxajudiciariaembargos = 36.68

        }


    } else if (moment(startformatado).isAfter('2021-03-05') && selectpercentualembargos =='0,3'){ 

        custasprocessuaisembargos = 0.003 * valorcausaembargosatualizado
        taxajudiciariaembargos = 0.003 * valorcausaembargosatualizado

        if (taxajudiciariaembargos < 36.68 * 0.3) {

            taxajudiciariaembargos = 36.68 * 0.3
        }    

        if (custasprocessuaisembargos < 176.26 * 0.3) {

            custasprocessuaisembargos = 176.26 * 0.3

        }


    } else if (moment(startformatado).isAfter('2021-03-05') && selectpercentualembargos =='0,7'){ 

        custasprocessuaisembargos = 0.007 * valorcausaembargosatualizado
        taxajudiciariaembargos = 0.007 * valorcausaembargosatualizado

        if (taxajudiciariaembargos < 36.68 * 0.7) {

            taxajudiciariaembargos = 36.68 * 0.7

        }

        if (custasprocessuaisembargos < 176.26 * 0.7) {

            custasprocessuaisembargos = 176.26 * 0.7

        }

    } else if (moment(startformatado).isAfter('2021-03-05') && selectpercentualembargos =='1,0'){ 

        custasprocessuaisembargos = 0.01 * valorcausaembargosatualizado
        taxajudiciariaembargos = 0.01 * valorcausaembargosatualizado

        if (taxajudiciariaembargos < 36.68) {

            taxajudiciariaembargos = 36.68 

        }

        if (custasprocessuaisembargos < 176.26 ) {

            custasprocessuaisembargos = 176.26

        }

    }


    if(isNaN(custasprocessuaisembargos) || isNaN(taxajudiciariaembargos)){

      $('#custasprocessuaisembargos').val('')
      $('#taxajudiciariaembargos').val('')
      $('#totalembargos').val('')  

  } else{

    $('#custasprocessuaisembargos').val(custasprocessuaisembargos.toFixed(2))
    $('#taxajudiciariaembargos').val(taxajudiciariaembargos.toFixed(2))

    var somatotalembargos = parseFloat($('#custasprocessuaisembargos').val()) + parseFloat($('#taxajudiciariaembargos').val())
    
    $('#totalembargos').val(somatotalembargos.toFixed(2))
    
}



})

/****************************************************************************/

//função que calcula custas/despesas extras

$('#dataeventoextras,#quantidadeextras,#valorextras,#selectcustasdespesasextras').change(function(){

    var start = $('#dataeventoextras').datepicker().val()

    var dataFormatada = start.replace(/(\d*)-(\d*)-(\d*).*/, '$3-$2-$1');

    var startformatado = moment(dataFormatada).format('YYYY-MM-DD')
    
    var selectcustasdespesasextras = document.getElementById('selectcustasdespesasextras').value    
    var totalcustasdespesasextras
    var valorunitario
    var valorunitarioextras
    var quantidadeextras

    if(moment(startformatado).isBefore('2021-03-05')){

        alert('Não há custas e despesas extras ante de 05/03/2021!')

        $('#selectcustasdespesasextras').val('Sem custas')
        $('#dataeventoextras').val('')
        $('#historicoextras').val('')
        $('#quantidadeextras').val('')
        $('#valorextras').val('')
        $('#totalextras').val('')
        $('#dataeventoextras').attr("readonly",true)
        $('#dataeventoextras').attr("disabled",true)
        $('#historicoextras').attr("readonly",true)
        $('#valorextras').attr("readonly",true)
        $('#quantidadeextras').attr("readonly",true)
        $('#totalextras').attr("readonly",true)


    } else if(moment(startformatado).isAfter('2021-03-05') && selectcustasdespesasextras =='Carta precatória'){

        valorunitario = 176.26
        $('#valorextras').val(valorunitario.toFixed(2))    

    } else if (moment(startformatado).isAfter('2021-03-05') && selectcustasdespesasextras =='Carta de ordem') {

        valorunitario = 176.26
        $('#valorextras').val(valorunitario.toFixed(2))   

    } else if (moment(startformatado).isAfter('2022-03-11') && selectcustasdespesasextras =='Publicação') {

        valorunitario = 20.00
        $('#valorextras').val(valorunitario.toFixed(2))

    } else if (moment(startformatado).isAfter('2022-03-11') && selectcustasdespesasextras ==
        'Porte') {

        valorunitario = 20.00
        $('#valorextras').val(valorunitario.toFixed(2))

    } else if (moment(startformatado).isAfter('2022-03-11') && selectcustasdespesasextras =='Citação/Intimação') {

        valorunitario = 20.00
        $('#valorextras').val(valorunitario.toFixed(2))    

    } else if (moment(startformatado).isAfter('2023-03-11') && selectcustasdespesasextras =='Certidão') {

        valorunitario = 20.00
        $('#valorextras').val(valorunitario.toFixed(2))

    } else if (moment(startformatado).isBefore('2023-03-11') && selectcustasdespesasextras =='Certidão') {

        alert("Não há cobrança dessas custas/taxas antes de 11-03-2023!")

        $('#selectcustasdespesasextras').val('Sem custas')
        $('#dataeventoextras').val('')
        $('#historicoextras').val('')
        $('#quantidadeextras').val('')
        $('#valorextras').val('')
        $('#totalextras').val('')
        $('#dataeventoextras').attr("readonly",true)
        $('#dataeventoextras').attr("disabled",true)
        $('#dataeventoextras').val('')
        $('#historicoextras').attr("readonly",true)
        $('#valorextras').attr("readonly",true)
        $('#quantidadeextras').attr("readonly",true)
        $('#totalextras').attr("readonly",true)
        $('#totalextras').val('') 


    }else if (moment(startformatado).isAfter('2023-03-11') && selectcustasdespesasextras =='Informações') {

        valorunitario = 40.00
        $('#valorextras').val(valorunitario.toFixed(2))

    } else if (moment(startformatado).isBefore('2023-03-11') && selectcustasdespesasextras =='Informações') {

        alert("Não há cobrança dessas custas/taxas antes de 11-03-2023!")

        $('#selectcustasdespesasextras').val('Sem custas')
        $('#dataeventoextras').val('')
        $('#historicoextras').val('')
        $('#quantidadeextras').val('')
        $('#valorextras').val('')
        $('#totalextras').val('')
        $('#dataeventoextras').attr("readonly",true)
        $('#dataeventoextras').attr("disabled",true)
        $('#dataeventoextras').val('')
        $('#historicoextras').attr("readonly",true)
        $('#valorextras').attr("readonly",true)
        $('#quantidadeextras').attr("readonly",true)
        $('#totalextras').attr("readonly",true)
        $('#totalextras').val('')  




    } else if (moment(startformatado).isAfter('2023-03-11') && selectcustasdespesasextras =='Bloqueio') {

        valorunitario = 40.00
        $('#valorextras').val(valorunitario.toFixed(2))

    } else if (moment(startformatado).isBefore('2023-03-11') && selectcustasdespesasextras =='Bloqueio') {

        alert("Não há cobrança dessas custas/taxas antes de 11-03-2023!")

        $('#selectcustasdespesasextras').val('Sem custas')
        $('#dataeventoextras').val('')
        $('#historicoextras').val('')
        $('#quantidadeextras').val('')
        $('#valorextras').val('')
        $('#totalextras').val('')
        $('#dataeventoextras').attr("readonly",true)
        $('#dataeventoextras').attr("disabled",true)
        $('#dataeventoextras').val('')
        $('#historicoextras').attr("readonly",true)
        $('#valorextras').attr("readonly",true)
        $('#quantidadeextras').attr("readonly",true)
        $('#totalextras').attr("readonly",true) 
        $('#totalextras').val('')

    }


    totalquantidadeextras = $('#quantidadeextras').val()
    
    totalcustasdespesasextras = valorunitario * totalquantidadeextras  

    $('#totalextras').val(totalcustasdespesasextras)


    if(isNaN($('#totalextras').val())){

      $('#totalextras').val('')  

  }



})



})


</script>

 <script>
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
 </script>


<script type="text/javascript"> var pag = "<?=$pag?>" 


</script>



<script src = "js/ajax_modulo_custas.js"></script>

<script src = "js/ajax.js"></script>

<script> /* $(document).ready(function(){$("#dataevento").mask("99/99/9999");});*/</script>


<div id="page-wrapper">

    <?php
    require_once('lista_custas.php');
    ?>

</div>