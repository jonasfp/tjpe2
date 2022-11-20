<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

$pag = 'danos_materiais_morais';

?>

<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="css/relatorio.css">

<!--**********************Ínicio form principal******************************-->

<!--**********************Tabela dados do processo***************************-->
<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div>
<h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3>

<div>
    
<?php 


$query = $pdo->query("DELETE FROM processo");
$query = $pdo->query("DELETE FROM parcelas");
$query = $pdo->query("DELETE FROM parametros_calculos_danos_materiais_morais");
$query = $pdo->query("DELETE FROM multa_diaria");
$query = $pdo->query("DELETE FROM multa_determinado");
$query = $pdo->query("DELETE FROM multa_condenacao");
$query = $pdo->query("DELETE FROM multa_causa");
$query = $pdo->query("DELETE FROM honorarios_condenacao");
$query = $pdo->query("DELETE FROM honorarios_multa");
$query = $pdo->query("DELETE FROM honorarios_determinado");
$query = $pdo->query("DELETE FROM honorarios_causa");
$query = $pdo->query("DELETE FROM custas");



?>


</div>     

<h4 style="text-align:center">CONTADORIA</h4>
<h5 style="text-align:center; margin-bottom: 3.0em;">FORUM DES. RODOLFO AURELIANO - AV. DES. GUERRA BARRETO, S/N - ILHA DO LEITE - RECIFE /PE</h5>                

<form method="post" id="formCiveisProcessos">

    <table class="table table-hover">
        <thead>
            <tr>
              <th class="text-left fonte-print" style="width:15%">NÚMERO DO PROCESSO </th>
              <th class="text-left fonte-print" style="width:15%">VARA</th>          
              <th class="text-left fonte-print" style="width:10%">EXEQUENTE</th>
              <th class="text-left fonte-print" style="width:10%">EXECUTADO</th>
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

                <input type="text" class="form-control" id="exequente" name="exequente" placeholder="Exequente">             
            </td>

            <td>

                <input type="text" class="form-control" id="executado" name="executado" placeholder="Executado">             
            </td>




            <td>


                
                    <button type="button" form="formCiveis" id="atualizarLinha" name="atualizarLinha"><i class="fa fa-refresh" aria-hidden="true" title="Atualizar linha"></i></button>    
              


               
                    <button type="submit" id="salvarLinhaProcesso" name="salvarLinhaProcesso" class="salvarLinhaProcesso"><i class="fa fa-save" title="Salvar linha"></i></button>
                

            </td>

        </tr>   

    </tbody>
</table>

</form>

<!--*********************Fim tabela dados do processo**********************-->

<!--**********************Tabela correção+juros****************************-->

<form method="post" id="formCiveisParametros" name="formCiveisParametros">

 <table class="table table-hover" >
    <thead>
        <tr>
          <th class="text-left fonte-print">CORREÇÃO MONETÁRIA </th>     
          <th class="text-left fonte-print" style="width: 17%;">TERMO FINAL</th>
          <th class="text-left fonte-print" style="width: 25%;">JUROS DE MORA </th>
          <th class="text-left fonte-print" style="width: 17%;">TERMO INICIAL</th>   
          <th class="text-left fonte-print" style="width: 17%;">TERMO FINAL</th>
          <th class="text-left fonte-print" style="width:7%">AÇÃO</th>               

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




 <!--

           <form>

             <select id="selectindicecorrecao" name="selectindicecorrecao" class="form-control">
               <option value="Encoge">ENCOGE</option>
               <option value="Igpm">IGPM</option>
               <option value="Ipca">IPCA</option>
               <option value="Poupança">POUPANÇA</option>
               <option value="Tr">TR</option>          
           </select>

       </form>

   -->

</td>

<td>
    <div>
        <input placeholder="Data final" type="text" id="datafinalcorrecao" name="datafinalcorrecao" class="form-control"></div>   

    </td>

    <td>

        <div class="form-group">
            <select class="form-control sel2" id="selecttipojuros" name="selecttipojuros" style="width:100%;" > 

                <?php 
                $query = $pdo->query("SELECT * FROM juros ORDER BY id asc");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                $total_reg = @count($res);
                if($total_reg > 0){
                    for($i=0; $i < $total_reg; $i++){
                        foreach ($res[$i] as $key => $value){}
                            echo '<option value="'.$res[$i]['id'].'">'.$res[$i]['nome'].'</option>';
                    }
                }else{
                                           // echo '<option value="0">Cadastre uma Categoria</option>';
                }
                ?>

            </select>   
        </div>  


    <!--

    <form>

     <select id="selecttipojuros" name="selecttipojuros" class="form-control">
        <option value="jurossimplesconstante">1% am durante todo o período</option>
        <option value="jurossimplesvariavel">0,5% am até 11/02/2003 e 1% am após</option>

    </select>

    </form>

-->

</td>

<td>

    <div>
        <input placeholder="Data inicial" type="text" id="datainicialjuros" name="datainicialjuros" class="form-control"></div>

    </td>

    <td>

        <div>
            <input placeholder="Data final" type="text" id="datafinaljuros" name="datafinaljuros" class="form-control"></div>

        </td>

        <td>


            
                <button type="button" form="formCiveis" id="atualizarLinha" name="atualizarLinha"><i class="fa fa-refresh" aria-hidden="true" title="Atualizar linha"></i></button>    
            
            
            
                <button type="submit" id="salvarLinhaParametros" name="salvarLinhaParametros" class="salvarLinhaParametros"><i class="fa fa-save" title="Salvar linha"></i></button>
            

        </td>            

    </tr>

</tbody>

</table>

</form>

<!--**********************Fim da tabela correção+juros**********************-->

<!--*****************************Tabela parcelas****************************-->

<form method="post" id="formCiveisParcelas" name="formCiveisParcelas">

    <table class="table table-hover" id="jonas">
        <thead>
            <tr>

              <th class="text-left fonte-print" style="width:12%">DATA</th>
              <th class="text-left fonte-print">HISTÓRICO</th>
              <th class="text-left fonte-print" style="width:10%">VALOR (R$)</th>
              <th class="text-left fonte-print" style="width:20%">CORREÇÃO MONETÁRIA</th>
              <th class="text-left fonte-print" style="width:20%">JUROS DE MORA (Nº DIAS)</th>
              <th class="text-left fonte-print" style="width:10%">TOTAL (R$)</th>
              <th class="text-center no-print fonte-print" style="width:12%">AÇÃO</th>

          </tr>
      </thead>



      <tbody id="modelo-linha">

        <tr class="linha-lancamento">  

            <td>

                <input placeholder="Data" type="text" id="dataevento" name="dataevento" class="form-control">

            </td>

            <td>

                <input type="text" class="form-control" id="historico" name="historico" placeholder="Histórico">             
            </td>

            <td>

                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">             
            </td>

            <td>

                <input type="text" class="form-control" id="indicecorrecao" name="indicecorrecao" placeholder="Correção Monetária">             
            </td>

            <td>

                <input type="text" class="form-control" id="juros" name="juros" placeholder="Juros Moratórios">             
            </td>

            <td>

                <!------------------Problema no banco corrigir no do ID--------->

                <input type="text" class="form-control" id="total" name="total" placeholder="Total">             
            </td>

            <td>

                
                    <button type="button" form="formCiveis" id="inserirLinha" name="inserirLinha"><i class="fa fa-plus" aria-hidden="true" title="Inserir linha"></i></button>
               

               
                    <button type="button" form="formCiveis" id="atualizarLinha" name="atualizarLinha"><i class="fa fa-refresh" aria-hidden="true" title="Atualizar linha"></i></button>    
             

               
                    <button type="button" form="formCiveis" id="removerLinha" name="removerLinha" ><i class="fa fa-minus" aria-hidden="true" title="Remover linha"></i></button>
                
                
                    <button type="submit" id="salvarLinha" name="salvarLinha" class="salvarLinha"><i class="fa fa-save" title="Salvar linha"></i></button>
               


            </td>            

        </tbody>

    </table>

</form>

<!--**********************Fim tabela parcelas****************************-->

<!--<div align="right"><h4 id="exibir" style="margin-bottom: 1.0em; margin-right: 18em;color: red;font-weight: bold;"><h4></div>-->


    <div align="right" class="margin-print" style="margin-right:9.3em ;">
    <!--
    <label for="exibir" style="margin-bottom: 1.0em; margin-right:20.4em;color: red;font-weight: bold; width:14%"> SUBTOTAL:</label>

    <input id="exibir" class = "form-control" style="margin-bottom: 1.0em; margin-right:12.3em;color: red;font-weight: bold; width:14%">
-->

<form class="form-inline">
    <div class="form-group">
      <label for="exibir">SUBTOTAL(R$):</label>
      <input type="text" style="color: red;font-weight: bold; font-size: 16px;"  id="exibir" placeholder="" name="exibir" disabled>
  </div>    
</form>

</div>


<!--**************************Honorários*****************************-->

<div>
    <h5 style="font-family:arial;margin-bottom:0.67em; font-weight:bold" class="formCiveisHonorariosCondenacaoonte-print">HONORÁRIOS SUCUMBENCIAIS:</h5>
    <select id="honorarios" name="honorarios" class="form-control">
        <option selected>Escolha</option>
        <option value="condenacao">Sobre o valor da condenação</option>
        <option value="causa">Sobre o valor da causa</option>
        <option value="valor">Valor determinado</option>
        <option value="semhonorarios">Sem honorários</option>
    </select>

    </div>

    <div>

    <form method="post" id="formCiveisHonorariosCondenacao" name="formCiveisHonorariosCondenacao">

    <div class="form-inline" style="margin-top:12px;">
        
        <input type="text" placeholder="Histórico" id="historicocondenacao" name="historicocondenacao" class="form-control" style="width:66%">


        <input type="text" placeholder="Percentual (%)" id="percentualcondenacao" name="percentualcondenacao" class="form-control" style="width:13%">
  

        <input type="text" placeholder="Total" id="honorariostotalcondenacao" name="honorariostotalcondenacao" class="form-control" style="width:13%"> 
           


         <button type="submit" id="salvarhonorarioscondenacao" name="salvarhonorarioscondenacao" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

        <button type="submit" id="removerhonorarioscondenacao" name="removerhonorarioscondenacao" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>  
          
    </div>

    </form>

</div>

<div>

    <form method="post" id="formCiveisHonorariosCausa" name="formCiveisHonorariosCausa">

        <div class="form-inline">

        <input type="text" placeholder="Data da causa" id="datadistribuicaocausa" name="datadistribuicaocausa" class="form-control" style="width:10%">

        
        <input type="text" placeholder="Histórico" id="historicocausa" name="historicocausa" class="form-control" style="width:41%">


        
        <input type="text" placeholder="Valor da Causa" id="valorcausa" name="valorcausa" class="form-control" style="width:10%">

      

        <input type="text" placeholder="Percentual(%)" id="percentualcausa" name="percentualcausa" class="form-control" style="width:10%">

       

        <input type="text" placeholder="Índice de correcao" id="indicedecorrecaohonorarioscausa" name="indicedecorrecaohonorarioscausa" class="form-control" style="width:10%" >
       

        <input type="text" placeholder="Total" id="honorariostotalcausa" name="honorariostotalcausa" class="form-control " style="width:10%">
      
        
        <button type="submit" id="salvarhonorarioscausa" name="salvarhonorarioscausa" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

        <button type="submit" id="removerhonorarioscausa" name="salvarhonorarioscausa" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>  
            
      

    </div>

 </form>

</div>

<div>

<form method="post" id="formCiveisHonorariosDeterminado" name="formCiveisHonorariosDeterminado">

    <div class="form-inline">
    
    <input type="text" placeholder="Data da determinação" id="datadistribuicaovalor" name="datadistribuicaovalor" class="form-control" style="width:13%">

    <input type="text" placeholder="Histórico" id="historicovalor" name="historicovalor" class="form-control" style="width:40.5%">

    <input type="text" placeholder="Valor determinado" id="valordeterminado" name="valordeterminado" class="form-control" style="width:15%">

    <input type="text" placeholder="Índice de correcao" id="indicedecorrecaohonorariosvalor" name="indicedecorrecaohonorariosvalor" class="form-control" style="width:15%">

    <input type="text" placeholder="Total" id="honorariostotaldeterminado" name="honorariostotaldeterminado" class="form-control" style="width:8%">

     
     <button type="submit" id="salvarhonorariosvalor" name="salvarhonorariosvalor" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

    <button type="submit" id="removerhonorariosvalor" name="removerhonorariosvalor" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>  
    
</div>

</form>

</div>



<!--***********************Fim do form****************************--> 

<!--***********************Custas*******************************-->

<form method="post" class="form-inline" id="formCiveisCustas">

    <h5 style="font-family:arial;margin-bottom:0.67em; font-weight:bold;margin-top:2.0em;" class="fonte-print">CUSTAS PROCESSUAIS:</h5>
    <select id="custas" name="custas" class="form-control" >
        <option selected>Escolha</option>

        <option value="Custas iniciais">Iniciais</option>
        <option value="Custas complementares">Complementares</option>
        <option value="Custas cumprimento">Cumprimento de sentença</option>
        <option value="Custas apelação">Apelação</option>
        <option value="Outros">Outros</option>
        <option value="semcustas">Sem custas</option>

    </select>

    <input type="text" placeholder="Data" id="custasdata" name="custasdata" class="form-control" style="width:12%">
   
    <input type="text" placeholder="Histórico" id="custashistorico" name="custashistorico" class="form-control" style="width:32.5%">    
    
    <input type="text" placeholder="Valor" id="custasvalor" name="custasvalor" class="form-control"style="width:8%">    
    
    <input type="text" placeholder="Índice correção" id="indicecorrecaocustas" name="indicecorrecaocustas" class="form-control" style="width:15%">
    
    <input type="text" placeholder="Custas atualizadas" id="custasatualizadas" name="custasatualizadas" class="form-control" style="width:8%">
    
    
    <button type="submit" id="salvarcustas" name="salvarcustas" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

    <button type="submit" id="removercustas" name="removercustas" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>    

</form>

<!--******************Fim do form******************************-->

<!--***************Honorários+Art.523*************************-->

<form method="post" class="form-inline" id="formCiveisHonorariosMulta" name="formCiveisHonorariosMulta">

    <h5 style="font-family:arial;margin-bottom:0.67em; font-weight:bold; margin-top:2.0em;" class="fonte-print">HONORÁRIOS + MULTA ART. 523</h5>
    <select id="honorariosmultaart523" name="honorariosmultaart523" class="form-control">

        <option selected>Escolha</option>
        <option value="honorariosmultaart523">Honorários + Multa Art. 523</option>
        <option value="semhonorariosmulta">Sem honorários+multa art. 523</option>          

    </select>

    <input type="text" placeholder="Histórico" id="historicoart523" name="historicoart523" class="form-control" style="width:55.9%">

    <input type="text" placeholder="Percentual (%)" id="percentualart523" name="percentualart523" class="form-control" style="width:10%">

    <input type="text" placeholder="Total" id="totalart523" name="totalart523" class="form-control" style="width:8%">
    
    
    <button type="submit" id="salvarmulta523" name="salvarmulta523" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

    <button type="submit" id="removermulta523" name="removermulta523" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>
    
</form>

<!--******************Fim do form************************************-->

<!--**************************Multas*****************************-->

    <h5 style="font-family:arial;margin-bottom:0.67em;font-weight:bold;margin-top:2.0em" class="fonte-print">MULTAS:</h5>
    
    <select id="multas" name="multas" class="form-control">

        <option selected>Escolha</option>
        <option value="multacondenacao">Sobre o valor da condenação</option>
        <option value="multacausa">Sobre o valor da causa</option>
        <option value="multavalor">Valor determinado</option>
        <option value="multadiaria">Diária</option>
        <option value="semmulta">Sem multas</option>

    </select>

    <form method="post" id="formCiveisMultasCondenacao" name="formCiveisMultasCondenacao">

    <div class="form-inline" style="margin-top:12px;">

    <input type="text" placeholder="Histórico" id="historicocondenacaomulta" name="historicocondenacaomulta" class="form-control" style="width:66%">
    <input type="text" placeholder="Percentual (%)" id="percentualcondenacaomulta" name="percentualcondenacaomulta" class="form-control" style="width:13%">
    <input type="text" placeholder="Total" id="totalmultacondenacao"  name="totalmultacondenacao" class="form-control" style="width:13%">
    
    
    <button type="submit" id="salvarmultacondenacao" name="salvarmultacondenacao" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

    <button type="submit" id="removermultacondenacao" name="removermultacondenacao" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>


</div>

</form>

    <form method="post" id="formCiveisMultasCausa">

    <div class="form-inline" style="margin-top:12px;">

    
    <input type="text" placeholder="Data da causa" id="datadistribuicaocausamulta" name="datadistribuicaocausamulta" class="form-control" style="width:10%">
    
    <input type="text" placeholder="Histórico" id="historicocausamulta" name="historicocausamulta" class="form-control" style="width:41%">
    
    <input type="text" placeholder="Valor da Causa" id="valorcausamulta" name="valorcausamulta" class="form-control" style="width:10%">
    
    <input type="text" placeholder="Percentual(%)" id="percentualcausamulta" name="percentualcausamulta" class="form-control" style="width:10%">

    <input type="text" placeholder="Índice de correcao multa" id="indicedecorrecaocausamulta" name="indicedecorrecaocausamulta" class="form-control" style="width:10%">

    <input type="text" placeholder="Totalcausa" id="totalmultacausa"  name="totalmultacausa" class="form-control" style="width:10%">

   
    <button type="submit" id="salvarmultacausa" name="salvarmultacausa" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

    <button type="submit" id="removermultacausa" name="removermultacausa" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>
    

    </div>

    </form>


    <form method="post" id="formCiveisMultasDeterminado" name="formCiveisMultasDeterminado">

    <div class="form-inline" style="margin-top:12px;">

    <input type="text" placeholder="Data da determinação" id="datadistribuicaovalormulta" name="datadistribuicaovalormulta" class="form-control" style="width:13%">
    
    <input type="text" placeholder="Histórico" id="historicovalormulta" name="historicovalormulta" class="form-control" style="width:40.6%">
    
    <input type="text" placeholder="Valor determinado" id="valordeterminadomulta" name="valordeterminadomulta" class="form-control" style="width:15%">   
    
    <input type="text" placeholder="Índice de correcao" id="indicedecorrecaovalormulta" name="indicedecorrecaovalormulta" class="form-control" style="width:15%">
    
    <input type="text" placeholder="Totaldeterminado" id="totalmultadeterminado"  name="totalmultadeterminado" class="form-control" style="width:8%">

    
    <button type="submit" id="salvarmultadeterminado" name="salvarmultadeterminado" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

    <button type="submit" id="removermultadeterminado" name="removermultadeterminado" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>


    </div>

    </form>

    <form method="post" id="formCiveisMultasDiaria" name="formCiveisMultasDiaria">

    <div class="form-inline" style="margin-top:12px;">

    <input type="text" placeholder="Histórico" id="historicomultadiaria" name="historicomultadiaria" class="form-control" style="width:38.8%">

    <input type="text" placeholder="Valor da multa diária (R$)" id="valormultadiaria" name="valormultadiaria" class="form-control" style="width:9%" >

    <input type="text" placeholder="Valor limite" id="valormultalimite" name="valormultalimite" class="form-control" style="width:9%">

    
    <input type="text" placeholder="Data de início" id="datainiciomultadiaria" name="datainiciomultadiaria" class="form-control" style="width:10%">
    
    <input type="text" placeholder="Data final" id="datafinalmultadiaria" name="datafinalmultadiaria" class="form-control" style="width:10%"> 
         
    <input type="text" placeholder="Nº dias" id="numerosdias" name="numerosdias" class="form-control" style="width:6%"> 

    
    <input type="text" placeholder="Total" id="totalmultadiaria"  name="totalmultadiaria" class="form-control" style="width:8%">


    <button type="submit" id="salvarmultadiaria" name="salvarmultadiaria" class=" btn btn-success" ><i class='fa fa-plus' style='color: white'></i></button>

    <button type="submit" id="removermultadiaria" name="removermultadiaria" class="btn btn-danger" ><i class="fa fa-remove" style='color: white' title="Salvar linha"></i></button>

     </div>

    </form>
    

<div align="center" style="margin-top:2.0em; margin-bottom:2.0em ;">
    <!--
    <label for="exibir" style="margin-bottom: 1.0em; margin-right:20.4em;color: red;font-weight: bold; width:14%"> SUBTOTAL:</label>

    <input id="exibir" class = "form-control" style="margin-bottom: 1.0em; margin-right:12.3em;color: red;font-weight: bold; width:14%">
-->

<form class="form-inline">
    <div class="form-group">
      <label for="exibirtotaldevido">VALOR TOTAL DEVIDO(R$):</label>
      <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control" id="exibirtotaldevido" name="exibirtotaldevido" placeholder="" disabled>
  </div>    
</form>

</div>

<!--*******************Fim do form**********************************--> 


<input type="hidden" name = "id">

<small><div id="mensagem" align="center"></div></small>               

<div class="modal-footer">
 
<a href="../rel/calculos.php" target="_blank"><i class="fa fa-file-text-o"></i><span>  Relatório</span></a>                    
 
</div>

<!--**********************Fim do form principal***********************-->


<!--**********************Scripts*************************************-->

<?php 

$query = $pdo->query("SELECT encoge, DATE_FORMAT(data,'%m-%Y') AS nicedata FROM indice_encoge");
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

        /*******************************inicio******************************/

        /*************************Primeira linha de lançamento**********************/

//inclusão de datapickers nos eventos de datas

$("#datainicialjuros,#datafinaljuros,#datainiciomultadiaria,#datafinalmultadiaria").datepicker({
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

$("#datafinalcorrecao,#dataevento,#datadistribuicaocausa,#datadistribuicaovalor,#custasdata,#datadistribuicaovalormulta,#datadistribuicaocausamulta ").datepicker({
    changeMonth: true,
    changeYear: true,
    firstDay: 1,
    dateFormat: 'mm-yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
})

//define campos de somente leitura

$('#indicecorrecao').prop('readonly',true);
$('#juros').prop('readonly', true);    
$('#total').prop('readonly', true);   

//fim definição de campos somente leitura

var jsonJS = <?php echo json_encode($indice)?>

//função que calcula o índice de correção e define o valor da parcela com a mudança da data final

$('#datafinalcorrecao').change(function(){   


    var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var start = $('#dataevento').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var valor1 = parseFloat(jsonJS[end])
    var valor2 = parseFloat(jsonJS[start])
    var result = (valor2/valor1);

    $('#indicecorrecao').val(result.toFixed(7));
    var juros = $('#juros').val()*0.01/30
    var indice = $('#indicecorrecao').val()
    var valor = parseFloat($('#valor').val())
    var totallinha = indice*(1+juros)*valor
    $('#total').val(totallinha.toFixed(2))
    var soma = $('#total').val()


})

//fim da função que calcula o índice de correção

//define o formato das datas do datapicker

$( "#datainicialjuros" ).datepicker({ dateFormat: 'dd-mm-yy' });
$( "#datafinaljuros" ).datepicker({ dateFormat: 'dd-mm-yy' });


//função que define o número de dias para o cálculo dos juros e calcula o valor total da parcela com a mudança da data inicial dos juros

$('#datainicialjuros').change(function() {

    var start = $('#datainicialjuros').datepicker('getDate');
    var end   = $('#datafinaljuros').datepicker('getDate');

    if (start<end) {
        var juros   = (end - start)/1000/60/60/24;    
        $('#juros').val(juros.toFixed(0));
        var juros = $('#juros').val()*0.01/30
        var indice = $('#indicecorrecao').val()
        var valor = parseFloat($('#valor').val())
        var totallinha = indice*(1+juros)*valor
        $('#total').val(totallinha.toFixed(2))
        var soma = $('#total').val()

    }
})


//função que define o número de dias para o cálculo dos juros e calcula o valor total da parcela com a mudança da data final dos juros

$('#datafinaljuros').change(function() {
    var start = $('#datainicialjuros').datepicker('getDate');
    var end   = $('#datafinaljuros').datepicker('getDate');

    if (start<end) {
        var juros   = (end - start)/1000/60/60/24;                 
        $('#juros').val(juros.toFixed(0));
        var juros = $('#juros').val()*0.01/30
        var indice = $('#indicecorrecao').val()
        var valor = parseFloat($('#valor').val())
        var totallinha = indice*(1+juros)*valor
        $('#total').val(totallinha.toFixed(2))
        var soma = $('#total').val()

    }
    else {
        alert ("Operação não permitida!");
        $('#datainicialjuros').val("");
        $('#datafinaljuros').val("");
        $('#juros').val("");
    }
})


/*****************************************************************/

$( "#datainiciomultadiaria").datepicker({ dateFormat: 'dd-mm-yy' });
$( "#datafinalmultadiaria").datepicker({ dateFormat: 'dd-mm-yy' });

$('#datainiciomultadiaria').change(function() {

    var start = $('#datainiciomultadiaria').datepicker('getDate');
    var end   = $('#datafinalmultadiaria').datepicker('getDate');

    if (start<end) {
        var numerosdias   = (end - start)/1000/60/60/24;    
        $('#numerosdias').val(numerosdias);
        
         calculamultadiaria()

    }
})


//função que define o número de dias para o cálculo dos juros e calcula o valor total da parcela com a mudança da data final dos juros

$('#datafinalmultadiaria').change(function() {

    var start = $('#datainiciomultadiaria').datepicker('getDate');
    var end   = $('#datafinalmultadiaria').datepicker('getDate');

    if (start<end) {
        var numerosdias   = (end - start)/1000/60/60/24;    
        $('#numerosdias').val(numerosdias);
       
       calculamultadiaria()

    }
})

$('#valormultadiaria').change(function() {

         calculamultadiaria()
           

})

$('#valormultalimite').change(function() {

    calculamultadiaria()
    

})






//função que calcula o valor total da parcela e o índice com sua mudança

$('#dataevento').change(function(){



    var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var start = $('#dataevento').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var valor1 = parseFloat(jsonJS[end])
    var valor2 = parseFloat(jsonJS[start])
    var result = (valor2/valor1);



    $('#indicecorrecao').val(result.toFixed(7));

    var juros = $('#juros').val()*0.01/30
    var indice = $('#indicecorrecao').val()
    var valor = parseFloat($('#valor').val())
    var totallinha = indice*(1+juros)*valor
    $('#total').val(totallinha.toFixed(2))
    var soma = $('#total').val()
    

})


//função que calcula os honorários com base no valor da causa

$('#datadistribuicaocausa').change(function(){



    var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var start = $('#datadistribuicaocausa').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var valor1 = parseFloat(jsonJS[end])
    var valor2 = parseFloat(jsonJS[start])
    var result = (valor2/valor1);


    $('#indicedecorrecaohonorarioscausa').val(result.toFixed(7));

    calculahonorarioscausa()      

})



//função de que os honorários com base no valor fixo

$('#datadistribuicaovalor').change(function(){



    var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var start = $('#datadistribuicaovalor').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var valor1 = parseFloat(jsonJS[end])
    var valor2 = parseFloat(jsonJS[start])
    var result = (valor2/valor1);



    $('#indicedecorrecaohonorariosvalor').val(result.toFixed(7));

    calculahonorariosdeterminado()      

})


//função que calcula o valor das custas

$('#custasdata').change(function(){




    var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var start = $('#custasdata').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var valor1 = parseFloat(jsonJS[end])
    var valor2 = parseFloat(jsonJS[start])
    var result = (valor2/valor1);


    $('#indicecorrecaocustas').val(result.toFixed(7))

    calculacustas()      

})


//função que calcula o valor da multa com base no valor da causa

$('#datadistribuicaocausamulta').change(function(){



    var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var start = $('#datadistribuicaocausamulta').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var valor1 = parseFloat(jsonJS[end])
    var valor2 = parseFloat(jsonJS[start])
    var result = (valor2/valor1);
    
    $('#indicedecorrecaocausamulta').val(result.toFixed(7))
    
    calculamultacausa()     

})


//função que calcula o valor da multa com base no valor fixado

$('#datadistribuicaovalormulta').change(function(){



    var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var start = $('#datadistribuicaovalormulta').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    var valor1 = parseFloat(jsonJS[end])
    var valor2 = parseFloat(jsonJS[start])
    var result = (valor2/valor1);
    
    $('#indicedecorrecaovalormulta').val(result.toFixed(7))
    
    calculamultadeterminado()     

    })


//função que calcula o valor total da parcela com base no valor da parcela sem correção

$('#valor').change(function() {

    var juros = $('#juros').val()*0.01/30
    var indice = $('#indicecorrecao').val()
    var valor = parseFloat($('#valor').val())
    var totallinha = indice*(1+juros)*valor
    $('#total').val(totallinha.toFixed(2))        

})



/*******************************Fim da primeira linha******************/


//função para inserir linha


var count = 1
var contador = 1


$('#jonas').on('click','#inserirLinha', function () {

    contador++             

    count++

    $(this).closest(".linha-lancamento").after('<tr id = "campo'+count+'" class = "linha-lancamento"> <td><input placeholder="Data" type="text" id="dataevento'+count+'" name="dataevento" class="form-control"></td> <td><input type="text" class="form-control" id="historico'+count+'" name="historico" placeholder="Histórico"></td> <td><input type="text" class="form-control" id="valor'+count+'" name="valor" placeholder="Valor"></td> <td><input type="text" class="form-control" id="indicecorrecao'+count+'" name="indicecorrecao" placeholder="Correção Monetária"></td> <td><input type="text" class="form-control" id="juros'+count+'" name="juros" placeholder="Juros Moratórios"></td> <td><input type="text" class="form-control" id="total'+count+'" name="total" placeholder="Total"></td> <td><div class="btn-group btn-group-sm no-print"><button type="button" id="inserirLinha"><i class="fa fa-plus" aria-hidden="true"></i></button></div> <div class="btn-group btn-group-sm no-print"><button type="button" id="atualizarLinha"><i class="fa fa-refresh" aria-hidden="true"></i></button></div> <div class="btn-group btn-group-sm no-print"><button type="button" id = "'+count+'"class= "removerLinha" ><i class="fa fa-minus" aria-hidden="true"></i></button></div> <div class="btn-group btn-group-sm no-print"><button type="submit" id="salvarLinha" class = "salvarLinha"><i class="fa fa-save"></i></button></div></td></tr>')


   /* 
    var jonas = document.getElementById("juros").value
    document.getElementById("juros"+count).value = jonas*/

 //replicar juros em todas as linhas   

 var juros = $("#juros").val()
 $('#juros'+count).val(juros);

// fim da replicação dos juros


   // $('#datainicialjuros'+count+',#datafinaljuros'+count+',#datafinalcorrecao'+count+',#dataevento'+count).

   //implementação do datepicker

   $('#dataevento'+count).datepicker({
    changeMonth: true,
    changeYear: true,
    firstDay: 1,
    dateFormat: 'mm-yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
})

   //função para alteração dos juros, indice, valor e total em caso de de mudança da data final dos juros
   
   $('#datafinaljuros').change(function() {

       var count1 = count

       while(count>=2){

        var juros = $("#juros").val()            
        $('#juros'+count).val(juros)
        var juros = $('#juros'+count).val()*0.01/30
        var indice = $('#indicecorrecao'+count).val()
        var valor = parseFloat($('#valor'+count).val())
        var totallinha = indice*(1+juros)*valor
        $('#total'+count).val(totallinha.toFixed(2))
        
        count--

    }

    somaparcial()

    count = count*count1


})

   
//função para alteração dos juros, indice, valor e total em caso de de mudança da data inicial dos juros

$('#datainicialjuros').change(function() {

  var count1 = count

  while(count>=2){

    var juros = $("#juros").val()           
    $('#juros'+count).val(juros)
    var juros = $('#juros'+count).val()*0.01/30
    var indice = $('#indicecorrecao'+count).val()
    var valor = parseFloat($('#valor'+count).val())
    var totallinha = indice*(1+juros)*valor
    $('#total'+count).val(totallinha.toFixed(2))

    count-- 

}

count = count*count1

somaparcial()
})


//define que indicede correcao, juros e total são de somente leitura

$('#indicecorrecao'+count).prop('readonly',true);
$('#juros'+count).prop('readonly', true);    
$('#total'+count).prop('readonly', true);


//calcula o valor do indice de correcao e o valor total em caso de alteração de data

$('#dataevento'+count).change(function(){

    var count1 = count
    

    while(count>=2){



        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
        var start = $('#dataevento'+count).datepicker({dateFormat: 'yyyy-mm-dd'}).val()

        var valor1 = parseFloat(jsonJS[end])
        var valor2 = parseFloat(jsonJS[start])
        var result = (valor2/valor1);

        $('#indicecorrecao'+count).val(result.toFixed(7));

        var juros = $('#juros'+count).val()*0.01/30
        var indice = $('#indicecorrecao'+count).val()
        var valor = parseFloat($('#valor'+count).val())
        var totallinha = indice*(1+juros)*valor
        $('#total'+count).val(totallinha.toFixed(2))            
        
        count--           

    }        

    count = count*count1

    somaparcial()


})



//calcula o valor do indice de correcao e o valor total em caso de alteração de data final de correção monetária


$('#datafinalcorrecao').change(function(){



    var end = $('#datafinalcorrecao').datepicker({dateFormat: 'yyyy-mm-dd'}).val()
    
    var count1 = count                 

    while(count>=2){    

        var start = $('#dataevento'+count).datepicker({dateFormat: 'dd-MM-yyyy'}).val()       
        var valor1 = parseFloat(jsonJS[end])
        var valor2 = parseFloat(jsonJS[start])
        var result = (valor2/valor1);

        $('#indicecorrecao'+count).val(result.toFixed(7));

        var juros = $('#juros'+count).val()*0.01/30
        var indice = $('#indicecorrecao'+count).val()
        var valor = parseFloat($('#valor'+count).val())
        var totallinha = indice*(1+juros)*valor
        $('#total'+count).val(totallinha.toFixed(2))           

        count--

    }

    count = count*count1

    somaparcial()
    
})


//implementa a mudança na totalização da linha em caso de mudança no valor da parcela

$('#valor'+count).change(function() {

    var count1 = count

    while(count>=2){  

        var juros = $('#juros'+count).val()*0.01/30
        var indice = $('#indicecorrecao'+count).val()
        var valor = parseFloat($('#valor'+count).val())
        var totallinha = indice*(1+juros)*valor
        $('#total'+count).val(totallinha.toFixed(2))       

        count-- 

    }

    count = count*count1

    somaparcial()

})


})

// fim do inserir linha

//implementa a função remover linha

$("#jonas").on("click",".removerLinha",function(){

    var button_id = $(this).attr("id")
    $('#campo'+button_id).remove()
    contador--   

})


//implementa a função de somaparcial da totalização das linhas


function somaparcial(){

    var soma = 0        
    var count2 = contador             

    while(contador>1){            

        soma += parseFloat($('#total'+contador).val())

        contador--          

    }

    contador = count2  

    var somatotal = soma+parseFloat($('#total').val())

    if(isNaN(somatotal)){

        //document.getElementById('exibir').innerHTML = String("SUBTOTAL(R$): Falta inserir o valor")

    } else{


    //document.getElementById('exibir').innerHTML = String("SUBTOTAL(R$): "+somatotal.toFixed(2))          
    //document.getElementById('exibir').innerHTML = String(somatotal.toFixed(2))
    document.getElementById('exibir').value = somatotal.toFixed(2)        

}                              


} 

// fim da função soma parcial 

/************************fim do inserir************************************/   




/****************************Honorários********************************/

//deixa os campos para somente leitura

$('#indicedecorrecaohonorariosvalor').prop('readonly',true);
$('#indicedecorrecaohonorarioscausa').prop('readonly', true); 
$('#honorariostotalcondenacao').prop('readonly', true);
$('#honorariostotalcausa').prop('readonly', true);
$('#honorariostotaldeterminado').prop('readonly', true);


// torna invisível os campos na inicialização do documento

$('#historicocondenacao').hide()
$('#percentualcondenacao').hide()
$('#historicovalor').hide()
$('#valordeterminado').hide()
$('#datadistribuicaovalor').hide()
$('#indicedecorrecaohonorariosvalor').hide()               
$('#historicocausa').hide()
$('#valorcausa').hide()
$('#percentualcausa').hide()
$('#datadistribuicaocausa').hide()
$('#indicedecorrecaohonorarioscausa').hide()
$('#honorariostotalcondenacao').hide()
$('#honorariostotalcausa').hide()
$('#honorariostotaldeterminado').hide()
$('#atualizarlinhahonorarioscondenacao').hide()
$('#salvarhonorarioscondenacao').hide()
$('#removerhonorarioscondenacao').hide()
$('#atualizarlinhahonorarioscausa').hide()
$('#salvarhonorarioscausa').hide()
$('#removerhonorarioscausa').hide()
$('#atualizarlinhahonorariosvalor').hide()
$('#salvarhonorariosvalor').hide()
$('#removerhonorariosvalor').hide()



// implementa as condições de visibilidade

$("#honorarios").click(function(){

    var honorarios = document.getElementById('honorarios').value        

    if(honorarios=="causa"){ 

       $('#historicocondenacao').hide()
       $('#percentualcondenacao').hide()
       $('#historicovalor').hide()
       $('#valordeterminado').hide()
       $('#datadistribuicaovalor').hide()
       $('#indicedecorrecaohonorariosvalor').hide()
       $('#honorariostotalcondenacao').hide()
       $('#honorariostotaldeterminado').hide()
       $('#atualizarlinhahonorarioscondenacao').hide()
       $('#salvarhonorarioscondenacao').hide()
       $('#removerhonorarioscondenacao').hide()
       $('#atualizarlinhahonorariosvalor').hide()
       $('#salvarhonorariosvalor').hide()
       $('#removerhonorariosvalor').hide()

       $('#historicocausa').show()
       $('#valorcausa').show()
       $('#percentualcausa').show()
       $('#datadistribuicaocausa').show()
       $('#indicedecorrecaohonorarioscausa').show()
       $('#honorariostotalcausa').show()
       $('#atualizarlinhahonorarioscausa').show()
       $('#salvarhonorarioscausa').show() 
       $('#removerhonorarioscausa').show() 


   } else if(honorarios == "condenacao"){

       $('#historicocausa').hide()
       $('#valorcausa').hide()
       $('#percentualcausa').hide()
       $('#datadistribuicaocausa').hide()                
       $('#indicedecorrecaohonorarioscausa').hide()               

       $('#historicovalor').hide()
       $('#valordeterminado').hide()
       $('#datadistribuicaovalor').hide()
       $('#indicedecorrecaohonorariosvalor').hide()
       $('#honorariostotalcausa').hide()
       $('#honorariostotaldeterminado').hide()

       $('#historicocondenacao').show()
       $('#percentualcondenacao').show()
       $('#honorariostotalcondenacao').show()
       $('#atualizarlinhahonorarioscondenacao').show()
       $('#salvarhonorarioscondenacao').show()
       $('#removerhonorarioscondenacao').show()


       $('#atualizarlinhahonorarioscausa').hide()
       $('#salvarhonorarioscausa').hide()
       $('#removerhonorarioscausa').hide()
       $('#atualizarlinhahonorariosvalor').hide()
       $('#salvarhonorariosvalor').hide()                       
       $('#removerhonorariosvalor').hide()                       


   } else if(honorarios == "valor"){

       $('#historicocausa').hide()
       $('#valorcausa').hide()
       $('#percentualcausa').hide()
       $('#datadistribuicaocausa').hide()                
       $('#indicedecorrecaohonorarioscausa').hide()               

       $('#historicovalor').show()
       $('#valordeterminado').show()
       $('#datadistribuicaovalor').show()
       $('#indicedecorrecaohonorariosvalor').show()
       $('#honorariostotaldeterminado').show()
       $('#atualizarlinhahonorariosvalor').show()
       $('#salvarhonorariosvalor').show()        
       $('#removerhonorariosvalor').show()        

       $('#historicocondenacao').hide()
       $('#percentualcondenacao').hide()
       $('#honorariostotalcondenacao').hide()
       $('#honorariostotalcausa').hide()

       $('#atualizarlinhahonorarioscondenacao').hide()
       $('#salvarhonorarioscondenacao').hide()
       $('#removerhonorarioscondenacao').hide()
       $('#atualizarlinhahonorarioscausa').hide()
       $('#salvarhonorarioscausa').hide()
       $('#removerhonorarioscausa').hide()



   } 
   else {

    $('#historicocausa').hide()
    $('#valorcausa').hide()
    $('#percentualcausa').hide()
    $('#datadistribuicaocausa').hide()                
    $('#indicedecorrecaohonorarioscausa').hide()               

    $('#historicovalor').hide()
    $('#valordeterminado').hide()
    $('#datadistribuicaovalor').hide()
    $('#indicedecorrecaohonorariosvalor').hide()

    $('#historicocondenacao').hide()
    $('#percentualcondenacao').hide()
    $('#honorariostotalcondenacao').hide()
    $('#honorariostotalcausa').hide()
    $('#honorariostotaldeterminado').hide()
    $('#atualizarlinhahonorarios').hide()
    $('#salvarlinhahonorarios').hide()
    $('#atualizarlinhahonorarioscondenacao').hide()
    $('#salvarhonorarioscondenacao').hide()
    $('#removerhonorarioscondenacao').hide()
    $('#atualizarlinhahonorarioscausa').hide()
    $('#salvarhonorarioscausa').hide()
    $('#removerhonorarioscausa').hide()
    $('#atualizarlinhahonorariosvalor').hide()
    $('#salvarhonorariosvalor').hide()       
    $('#removerhonorariosvalor').hide()       

}    
})


window.addEventListener("click", function() {

    calculahonorarioscondenacao()
    calculahonorarioscausa()
    calculahonorariosdeterminado()
    calculamultacondenacao()
    calculamultacausa()
    calculamultadeterminado()
    calculacustas()
    calculamultacondenacao()
    calculamultacausa()
    calculamultadeterminado()
    calculamultadiaria()
    calculahonorariosmultaart523()
    calculavalortotaldevido()

})

function calculahonorarioscondenacao(){

    var convertepercentual = ($('#percentualcondenacao').val())/100  
    var subtotalparcelas = Number.parseFloat(document.getElementById('exibir').value)
    var totalhonorarioscondenacao = convertepercentual*subtotalparcelas
    $('#honorariostotalcondenacao').val(totalhonorarioscondenacao.toFixed(2))

}


function calculahonorarioscausa(){

    var convertepercentual = ($('#percentualcausa').val())/100  
    var valordacausa = $('#valorcausa').val()
    var indicecorrecaocausa = $('#indicedecorrecaohonorarioscausa').val()
    var totalhonorarioscausa = convertepercentual*valordacausa*indicecorrecaocausa
    $('#honorariostotalcausa').val(totalhonorarioscausa.toFixed(2))

}



function calculahonorariosdeterminado(){

    var valordeterminado = $('#valordeterminado').val()
    var indicecorrecaodeterminado = $('#indicedecorrecaohonorariosvalor').val() 
    var totalhonorarioscondenacao = valordeterminado*indicecorrecaodeterminado
    $('#honorariostotaldeterminado').val(totalhonorarioscondenacao.toFixed(2))

}

/***********************************************************************/

/*********************************Custas********************************/

$('#indicecorrecaocustas').prop('readonly',true);
$('#custasatualizadas').prop('readonly', true);          

$('#custasdata').hide()
$('#custashistorico').hide()
$('#custasvalor').hide()
$('#indicecorrecaocustas').hide()
$('#custasatualizadas').hide()
$('#atualizarlinhacustas').hide()
$('#salvarcustas').hide()      
$('#removercustas').hide()      


$("#custas").click(function(){

    var custas = document.getElementById('custas').value      

    if(custas=="Custas iniciais" || custas=="Custas complementares" ||custas=="Custas apelação" || custas =="Custas cumprimento" || custas =="Outros"){ 

        $('#custasdata').show()
        $('#custashistorico').show()
        $('#custasvalor').show()
        $('#indicecorrecaocustas').show()
        $('#custasatualizadas').show()
        $('#atualizarlinhacustas').show()
        $('#salvarcustas').show() 
        $('#removercustas').show() 

    } 

    else {

        $('#custasdata').hide()
        $('#custashistorico').hide()
        $('#custasvalor').hide()
        $('#indicecorrecaocustas').hide()
        $('#custasatualizadas').hide()
        $('#atualizarlinhacustas').hide()
        $('#salvarcustas').hide()                  
        $('#removercustas').hide()                  

    }   
})


function calculacustas(){

    var valordascustas = $('#custasvalor').val()
    var indicecorrecaocustas = $('#indicecorrecaocustas').val()
    var valorcustasatualizadas = valordascustas*indicecorrecaocustas
    $('#custasatualizadas').val(valorcustasatualizadas.toFixed(2))

}

/***********************************************************************/

/*********************Honorários+Multa Art. 523*************************/

$('#totalart523').prop('readonly',true);            
$('#historicoart523').hide()
$('#percentualart523').hide()
$('#totalart523').hide()
$('#atualizarlinhamulta523').hide()
$('#salvarmulta523').hide()                              
$('#removermulta523').hide()                              


$("#honorariosmultaart523").click(function(){

    var honorariosmultaart523 = document.getElementById('honorariosmultaart523').value      

    if(honorariosmultaart523=="honorariosmultaart523"){ 

        $('#historicoart523').show()
        $('#percentualart523').show()
        $('#totalart523').show()
        $('#atualizarlinhamulta523').show()
        $('#salvarmulta523').show()
        $('#removermulta523').show()


    }  else {

        $('#historicoart523').hide()
        $('#percentualart523').hide()
        $('#totalart523').hide()
        $('#atualizarlinhamulta523').hide()
        $('#salvarmulta523').hide()
        $('#removermulta523').hide()
        

    }   
})

function calculahonorariosmultaart523(){

    var convertepercentual = ($('#percentualart523').val())/100
    var totalhonorarios = Number.parseFloat($('#honorariostotalcondenacao').val())
    var totalcustas =  Number.parseFloat($('#custasatualizadas').val())   
    var subtotal = Number.parseFloat(document.getElementById('exibir').value)
    var valorbaseart523 = totalhonorarios+totalcustas+subtotal
    var totalhonorariosmultaart523 = convertepercentual*valorbaseart523
    $('#totalart523').val(totalhonorariosmultaart523.toFixed(2))

}


/***********************************************************************/  
/****************************Multas********************************/

$('#indicedecorrecaovalormulta').prop('readonly',true);
$('#indicedecorrecaocausamulta').prop('readonly', true);
$('#numerosdias').prop('readonly', true);
$('#totalmultacondenacao').prop('readonly', true);
$('#totalmultacausa').prop('readonly', true);
$('#totalmultadeterminado').prop('readonly', true);
$('#totalmultadiaria').prop('readonly', true);

$('#historicocondenacaomulta').hide()
$('#percentualcondenacaomulta').hide()
$('#historicocausamulta').hide()
$('#valorcausamulta').hide()
$('#percentualcausamulta').hide()
$('#datadistribuicaocausamulta').hide()
$('#indicedecorrecaocausamulta').hide()

$('#historicovalormulta').hide()
$('#valordeterminadomulta').hide()
$('#datadistribuicaovalormulta').hide()
$('#indicedecorrecaovalormulta').hide()

$('#historicomultadiaria').hide()
$('#valormultadiaria').hide()
$('#valormultalimite').hide()
$('#datainiciomultadiaria').hide()
$('#datafinalmultadiaria').hide()
$('#indicecorrecaomultadiaria').hide()
$('#numerosdias').hide()
       

$('#totalmultacondenacao').hide()
$('#totalmultacausa').hide()
$('#totalmultadeterminado').hide()
$('#totalmultadiaria').hide()
$('#salvarmultacondenacao').hide()
$('#removermultacondenacao').hide()
$('#salvarmultacausa').hide()
$('#removermultacausa').hide()
$('#salvarmultadeterminado').hide()
$('#removermultadeterminado').hide()
$('#salvarmultadiaria').hide()
$('#removermultadiaria').hide()


$("#multas").click(function(){

    var multas = document.getElementById('multas').value        

    if(multas=="multacausa"){ 

       $('#historicocondenacaomulta').hide()
       $('#percentualcondenacaomulta').hide()

       $('#historicocausamulta').show()
       $('#valorcausamulta').show()
       $('#percentualcausamulta').show()
       $('#datadistribuicaocausamulta').show()
       $('#indicedecorrecaocausamulta').show()
       $('#totalmultacausa').show()       
       $('#salvarmultacausa').show()
       $('#removermultacausa').show()

       $('#historicovalormulta').hide()
       $('#valordeterminadomulta').hide()
       $('#datadistribuicaovalormulta').hide()
       $('#indicedecorrecaovalormulta').hide()
       $('#totalmultadeterminado').hide()
       $('#totalmultadiaria').hide()
       $('#totalmultacondenacao').hide()  

       $('#historicomultadiaria').hide()
       $('#valormultadiaria').hide()
       $('#valormultalimite').hide()
       $('#datainiciomultadiaria').hide()
       $('#datafinalmultadiaria').hide()
       $('#indicecorrecaomultadiaria').hide()
       $('#numerosdias').hide()


       $('#salvarmultacondenacao').hide()
       $('#removermultacondenacao').hide()
        $('#salvarmultadeterminado').hide()
        $('#removermultadeterminado').hide()
        $('#salvarmultadiaria').hide()
        $('#removermultadiaria').hide()

   } else if(multas == "multacondenacao"){

       $('#historicocausamulta').hide()
       $('#valorcausamulta').hide()
       $('#percentualcausamulta').hide()
       $('#datadistribuicaocausamulta').hide()
       $('#indicedecorrecaocausamulta').hide()

       $('#historicovalormulta').hide()
       $('#valordeterminadomulta').hide()
       $('#datadistribuicaovalormulta').hide()
       $('#indicedecorrecaovalormulta').hide()
       $('#totalmultacausa').hide()
       $('#totalmultadeterminado').hide()
       $('#totalmultadiaria').hide()


       $('#historicocondenacaomulta').show()
       $('#percentualcondenacaomulta').show()
       $('#totalmultacondenacao').show()
       $('#atualizarlinhamulta').show()
       $('#salvarmultacondenacao').show()
       $('#removermultacondenacao').show()

       $('#historicomultadiaria').hide()
       $('#valormultadiaria').hide()
       $('#valormultalimite').hide()
       $('#datainiciomultadiaria').hide()
       $('#datafinalmultadiaria').hide()
       $('#indicecorrecaomultadiaria').hide()
       $('#numerosdias').hide()


       $('#salvarmultacausa').hide()
       $('#removermultacausa').hide()
        $('#salvarmultadeterminado').hide()
        $('#removermultadeterminado').hide()
        $('#salvarmultadiaria').hide()
        $('#removermultadiaria').hide()



   } else if(multas == "multavalor"){

       $('#historicocondenacaomulta').hide()
       $('#percentualcondenacaomulta').hide()

       $('#historicocausamulta').hide()
       $('#valorcausamulta').hide()
       $('#percentualcausamulta').hide()
       $('#datadistribuicaocausamulta').hide()
       $('#indicedecorrecaocausamulta').hide()
       $('#totalmultacondenacao').hide()
       $('#totalmultacausa').hide()


       $('#historicovalormulta').show()
       $('#valordeterminadomulta').show()
       $('#datadistribuicaovalormulta').show()
       $('#indicedecorrecaovalormulta').show()
       $('#totalmultadeterminado').show()
       $('#atualizarlinhamulta').show()
       $('#salvarmultadeterminado').show()
       $('#removermultadeterminado').show()

       $('#historicomultadiaria').hide()
       $('#valormultadiaria').hide()
       $('#valormultalimite').hide()
       $('#datainiciomultadiaria').hide()
       $('#datafinalmultadiaria').hide()
       $('#indicecorrecaomultadiaria').hide()
       $('#numerosdias').hide()


       $('#salvarmultacausa').hide()
       $('#removermultacausa').hide()
        $('#salvarmultacondenacao').hide()
        $('#removermultacondenacao').hide()
        $('#salvarmultadiaria').hide()    
        $('#removermultadiaria').hide()    


   } else if (multas == "multadiaria") {


       $('#historicocondenacaomulta').hide()
       $('#percentualcondenacaomulta').hide()

       $('#historicocausamulta').hide()
       $('#valorcausamulta').hide()
       $('#percentualcausamulta').hide()
       $('#datadistribuicaocausamulta').hide()
       $('#indicedecorrecaocausamulta').hide()


       $('#historicovalormulta').hide()
       $('#valordeterminadomulta').hide()
       $('#datadistribuicaovalormulta').hide()
       $('#indicedecorrecaovalormulta').hide()
       $('#totalmultacondenacao').hide()
       $('#totalmultacausa').hide()
       $('#totalmultadeterminado').hide()


       $('#historicomultadiaria').show()
       $('#valormultadiaria').show()
       $('#valormultalimite').show()
       $('#datainiciomultadiaria').show()
       $('#datafinalmultadiaria').show()
       $('#indicecorrecaomultadiaria').show()
       $('#totalmultadiaria').show()
       $('#atualizarlinhamulta').show()
       $('#salvarmultadiaria').show()
       $('#removermultadiaria').show()
       $('#numerosdias').show()

       $('#salvarmultacausa').hide()
       $('#removermultacausa').hide()
        $('#salvarmultadeterminado').hide()
        $('#removermultadeterminado').hide()
        $('#salvarmultacondenacao').hide()
        $('#removermultacondenacao').hide()

   }


else {

   $('#historicocausamulta').hide()
   $('#valorcausamulta').hide()
   $('#percentualcausamulta').hide()
   $('#datadistribuicaocausamulta').hide()
   $('#indicedecorrecaocausamulta').hide()

   $('#historicovalormulta').hide()
   $('#valordeterminadomulta').hide()
   $('#datadistribuicaovalormulta').hide()
   $('#indicedecorrecaovalormulta').hide()

   $('#historicocondenacaomulta').hide()
   $('#percentualcondenacaomulta').hide()


   $('#historicomultadiaria').hide()
   $('#valormultadiaria').hide()
   $('#valormultalimite').hide()
   $('#datainiciomultadiaria').hide()
   $('#datafinalmultadiaria').hide()
   $('#indicecorrecaomultadiaria').hide()
   $('#totalmultacondenacao').hide()
   $('#totalmultacausa').hide()
   $('#totalmultadeterminado').hide()
   $('#totalmultadiaria').hide()
   $('#atualizarlinhamulta').hide()
   $('#salvarmultacondenacao').hide()
   $('#removermultacondenacao').hide()
$('#salvarmultacausa').hide()
$('#removermultacausa').hide()
$('#salvarmultadeterminado').hide()
$('#removermultadeterminado').hide()
$('#salvarmultadiaria').hide()
$('#removermultadiaria').hide()
$('#numerosdias').hide()

   

}

})


function calculamultacondenacao(){

    var convertepercentual = ($('#percentualcondenacaomulta').val())/100  
    var subtotalparcelas = Number.parseFloat(document.getElementById('exibir').value)
    var totalmultacondenacao = convertepercentual*subtotalparcelas
    $('#totalmultacondenacao').val(totalmultacondenacao.toFixed(2))

}

function calculamultacausa(){

    var convertepercentualmulta = ($('#percentualcausamulta').val())/100  
    var valordacausamulta = $('#valorcausamulta').val()
    var indicecorrecaocausamulta = $('#indicedecorrecaocausamulta').val()
    var multacausa = convertepercentualmulta*valordacausamulta*indicecorrecaocausamulta
    $('#totalmultacausa').val(multacausa.toFixed(2))

}

function calculamultadeterminado(){

    var valordeterminadomulta = $('#valordeterminadomulta').val()
    var indicecorrecaodeterminado = $('#indicedecorrecaovalormulta').val() 
    var multadeterminado = valordeterminadomulta*indicecorrecaodeterminado
    $('#totalmultadeterminado').val(multadeterminado.toFixed(2))

}

function calculamultadiaria(){

        var numerosdias = $('#numerosdias').val();        
        var valor = parseFloat($('#valormultadiaria').val());
        var total = numerosdias*valor;
        var valorlimite = parseFloat($('#valormultalimite').val());
        if(total>=valorlimite){
           $('#totalmultadiaria').val(valorlimite.toFixed(2)) 
       } else{

        $('#totalmultadiaria').val(total.toFixed(2))

       }      
        
        var soma = $('#totalmultadiaria').val()

}

function calculavalortotaldevido(){

    var subtotal = Number.parseFloat(document.getElementById('exibir').value)
    var totalcustas =  Number.parseFloat($('#custasatualizadas').val())
    var totalhonorarios = Number.parseFloat($('#honorariostotalcondenacao').val())+Number.parseFloat($('#honorariostotalcausa').val())+Number.parseFloat($('#honorariostotaldeterminado').val())

    var totalart523 = Number.parseFloat($('#totalart523').val())

    var tmultacondenacao = Number.parseFloat($('#totalmultacondenacao').val())

    if(isNaN(tmultacondenacao)){
        tmultacondenacao = 0
    }

    var tmultacausa = Number.parseFloat($('#totalmultacausa').val())

    if(isNaN(tmultacausa)){
        tmultacausa = 0
    }

    var tmultadeterminado = Number.parseFloat($('#totalmultadeterminado').val())

    if(isNaN(tmultadeterminado)){
        tmultadeterminado = 0
    }

    var tmultadiaria = Number.parseFloat($('#totalmultadiaria').val())

     if(isNaN(tmultadiaria)){
        tmultadiaria = 0
    }

    var totalmulta = tmultacondenacao+tmultacausa+tmultadeterminado+tmultadiaria

    
    if(isNaN(subtotal)) {

        subtotal = 0     
        

    } 

    if (isNaN(totalcustas)) {

        totalcustas = 0

        
    } 

    if (isNaN(totalhonorarios)) {

        totalhonorarios = 0

    }

    if (isNaN(totalart523)) {

        totalart523 = 0


    } 

    if (isNaN(totalmulta)) {


        totalmulta = 0

    } 

    var vl = subtotal + totalcustas + totalhonorarios + totalart523 + totalmulta



    $('#exibirtotaldevido').val(vl.toFixed(2))         
  
    
}

})

/***********************************************************************/


</script>


<script type="text/javascript"> var pag = "<?=$pag?>" </script>

<script src = "js/ajax2.js"></script>

<script src = "js/ajax.js"></script>

<script> /* $(document).ready(function(){$("#dataevento").mask("99/99/9999");});*/</script>
