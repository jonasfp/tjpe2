<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

$pag = 'expurgos_inflacionarios';

?>

<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="css/relatorio.css">

<!--**********************Ínicio form principal******************************-->

<!--**********************Tabela dados do processo***************************-->
<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div>
<h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3>     

<h4 style="text-align:center">CONTADORIA</h4>
<h5 style="text-align:center; margin-bottom: 3.0em;">FORUM DES. RODOLFO AURELIANO - AV. DES. GUERRA BARRETO, S/N - ILHA DO LEITE - RECIFE /PE</h5>                

<form method="post" id="formCiveis">

    <table class="table table-hover">
        <thead>
            <tr>
              <th class="text-left fonte-print" style="width:15%">NÚMERO DO PROCESSO </th>
              <th class="text-left fonte-print" style="width:15%">VARA</th>          
              <th class="text-left fonte-print" style="width:10%">EXEQUENTE</th>
              <th class="text-left fonte-print" style="width:10%">EXECUTADO</th>        


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


        </tr>

    </tbody>
</table>

<!--*********************Fim tabela dados do processo**********************-->

<!--**********************Tabela correção+juros****************************-->

<table class="table table-hover" >
    <thead>
        <tr>
          <th class="text-left fonte-print">CORREÇÃO MONETÁRIA </th>     
          <th class="text-left fonte-print" style="width: 17%;">TERMO FINAL</th>
          <th class="text-left fonte-print" style="width: 25%;">JUROS DE MORA </th>
          <th class="text-left fonte-print" style="width: 17%;">TERMO INICIAL</th>     
          <th class="text-left fonte-print" style="width: 17%;">TERMO FINAL</th>               

      </tr>
  </thead>
  
  <tbody>             

    <tr>

        <td>

           <form>

             <select id="selectindicecorrecao" name="selectindicecorrecao" class="form-control">
               <option value="Encoge">ENCOGE</option>
               <option value="Igpm">IGPM</option>
               <option value="Ipca">IPCA</option>
               <option value="Poupança">POUPANÇA</option>
               <option value="Tr">TR</option>          
           </select>

       </form>

   </td>

   <td>

    <input placeholder="Data final" type="text" id="datafinalcorrecao" name="datafinalcorrecao" class="form-control"></div>    

</td>

<td>

    <form>

     <select id="selecttipojuros" name="selecttipojuros" class="form-control">
        <option value="jurossimplesconstante">1% am durante todo o período</option>
        <option value="jurossimplesvariavel">0,5% am até 11/02/2003 e 1% am após</option>

    </select>

</form>

</td>

<td>

    <div>
        <input placeholder="Data inicial" type="text" id="datainicialjuros" name="datainicialjuros" class="form-control"></div>

    </td>

    <td>

        <div>
            <input placeholder="Data final" type="text" id="datafinaljuros" name="datafinaljuros" class="form-control"></div>

        </td>

    </tr>

</tbody>

</table>

<!--**********************Fim da tabela correção+juros**********************-->

<!--*****************************Tabela parcelas****************************-->

<table class="table table-hover" id="jonas">
    <thead>
        <tr>

          <th class="text-left fonte-print" style="width:12%">DATA</th>
          <th class="text-left fonte-print" style="font-size: 16px;text-align: center">HISTÓRICO</th>
          <th class="text-left fonte-print" style="width:10%; font-size: 16px; text-align: center">SALDO(Cz$) JAN/89</th>
          <th class="text-left fonte-print" style="width:10%; font-size: 16px; text-align: center">DIFERENÇA DEVIDA(Cz$)</th>
          <th class="text-left fonte-print" style="width:10%; font-size: 16px; text-align: center">CORREÇÃO MONETÁRIA</th>
          <th class="text-left fonte-print" style="width:10%; font-size: 16px; text-align: center">JUROS DE MORA (Dias)</th>
          <th class="text-left fonte-print" style="width:10%; font-size: 16px;text-align: center">TOTAL (R$)</th>
          <th class="text-center no-print fonte-print" style="width:10%; font-size: 16px;text-align: center">AÇÃO</th>

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

            <input type="text" class="form-control" id="saldo" name="saldo" placeholder="Valor">             
        </td>

        <td>

            <input type="text" class="form-control" id="diferenca" name="diferenca" placeholder="Diferença">             
        </td>

        <td>

            <input type="text" class="form-control" id="indicecorrecao" name="indicecorrecao" placeholder="Correção">             
        </td>

        <td>

            <input type="text" class="form-control" id="juros" name="juros" placeholder="Juros">             
        </td>

        <td>

            <!------------------Problema no banco corrigir no do ID--------->

            <input type="text" class="form-control" id="total" name="total" placeholder="Total">             
        </td>

        <td>

            <div class="btn-group btn-group-sm no-print">
                <button type="button" form="formCiveis" id="inserirLinha" name="inserirLinha"><i class="fa fa-plus" aria-hidden="true" title="Inserir linha"></i></button>
            </div>

            <div class="btn-group btn-group-sm no-print">
                <button type="button" form="formCiveis" id="atualizarLinha"><i class="fa fa-refresh" aria-hidden="true" title="Atualizar linha"></i></button>    
            </div>

            <div class="btn-group btn-group-sm no-print">
                <button type="button" form="formCiveis" id="removerLinha" ><i class="fa fa-minus" aria-hidden="true" title="Remover linha"></i></button>
            </div>
            <div class="btn-group btn-group-sm no-print">
                <button type="submit" id="salvarLinha" class="salvarLinha"><i class="fa fa-save" title="Salvar linha"></i></button>
            </div>

        </td>            

    </tbody>

</table>

<!--**********************Fim tabela parcelas****************************-->

<!--<div align="right"><h4 id="exibir" style="margin-bottom: 1.0em; margin-right: 18em;color: red;font-weight: bold;"><h4></div>-->


<div align="right" class="margin-print" style="margin-right:12em ;">
<!--
    <label for="exibir" style="margin-bottom: 1.0em; margin-right:20.4em;color: red;font-weight: bold; width:14%"> SUBTOTAL:</label>

    <input id="exibir" class = "form-control" style="margin-bottom: 1.0em; margin-right:12.3em;color: red;font-weight: bold; width:14%">
-->

<form class="form-inline">
    <div class="form-group">
      <label for="exibir">SUBTOTAL(R$):</label>
      <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control" id="exibir" placeholder="" name="exibir" disabled>
  </div>    
</form>

</div>


<!--**************************Honorários*****************************-->

<form class="form-inline">
    <h5 style="font-family:arial;margin-bottom:0.67em; margin-left:0.50em; font-weight:bold" class="fonte-print">HONORÁRIOS SUCUMBENCIAIS:</h5>
    <select id="honorarios" name="honorarios" onclick="honorarios()" class="form-control" style="margin-left:0.50em">
        <option selected>Escolha</option>

        <option value="condenacao">Sobre o valor da condenação</option>
        <option value="causa">Sobre o valor da causa</option>
        <option value="valor">Valor determinado</option>
        <option value="semhonorarios">Sem honorários</option>

    </select>

    <input type="text" placeholder="Histórico" id="historicocondenacao" class="form-control">
    <input type="text" placeholder="Percentual (%)" id="percentualcondenacao" class="form-control">

    <input type="text" placeholder="Data da distribuição" id="datadistribuicaocausa" class="form-control" style="width:12%">
    <input type="text" placeholder="Histórico" id="historicocausa" class="form-control" style="width:20%">
    <input type="text" placeholder="Valor da Causa" id="valorcausa" class="form-control" style="width:8%">
    <input type="text" placeholder="Percentual(%)" id="percentualcausa" class="form-control" style="width:8%">    
    <input type="text" placeholder="Índice de correcao" id="indicedecorrecaohonorarioscausa" class="form-control" style="width:15%">
    
    <input type="text" placeholder="Data da determinação" id="datadistribuicaovalor" class="form-control" style="width:12%">
    <input type="text" placeholder="Histórico" id="historicovalor" class="form-control" style="width:20%">
    <input type="text" placeholder="Valor determinado" id="valordeterminado" class="form-control" style="width:8%">
    <input type="text" placeholder="Índice de correcao" id="indicedecorrecaohonorariosvalor" class="form-control" style="width:15%">

    <input type="text" placeholder="Total" id="honorariostotalcondenacao" class="form-control" style="width:8%">
    <input type="text" placeholder="Total" id="honorariostotalcausa" class="form-control" style="width:8%">
    <input type="text" placeholder="Total" id="honorariostotaldeterminado" class="form-control" style="width:8%">

    
</form>

<!--***********************Fim do form****************************--> 


<!--***********************Custas*************************************-->

<form class="form-inline">
    <h5 style="font-family:arial;margin-bottom:0.67em; margin-left:0.50em; font-weight:bold;margin-top:2.0em;" class="fonte-print">CUSTAS PROCESSUAIS:</h5>
    <select id="custas" name="custas" onclick="custas()" class="form-control" style="margin-left:0.50em">
        <option selected>Escolha</option>

        <option value="custasiniciais">Iniciais</option>
        <option value="custascomplementar">Complementares</option>
        <option value="custascumprimento">Cumprimento de sentença</option>
        <option value="custasapelacao">Apelação</option>
        <option value="custasoutros">Outros</option>
        <option value="semcustas">Sem custas</option>

    </select>

    <input type="text" placeholder="Data" id="custasdata" class="form-control" style="width:12%">
    <input type="text" placeholder="Histórico" id="custashistorico" class="form-control" style="width:20%">    
    <input type="text" placeholder="Valor" id="custasvalor" class="form-control"style="width:8%">    
    <input type="text" placeholder="Índice correção" id="indicecorrecaocustas" class="form-control" style="width:15%">
    <input type="text" placeholder="Custas atualizadas" id="custasatualizadas" class="form-control" style="width:8%">    

</form>

<!--******************Fim do form******************************-->

<!--*******************Honorários+Art.523*****************************-->

<form class="form-inline">
    <h5 style="font-family:arial;margin-bottom:0.67em; margin-left:0.50em; font-weight:bold; margin-top:2.0em;" class="fonte-print">HONORÁRIOS + MULTA ART. 523</h5>
    <select id="honorariosmultaart523" name="honorariosmultaart523" onclick="honorariosmulta()" class="form-control" style="margin-left:0.50em">
        <option selected>Escolha</option>

        <option value="honorariosmultaart523">Honorários + Multa Art. 523</option>
        <option value="semhonorariosmulta">Sem honorários+multa art. 523</option>          

    </select>

    <input type="text" placeholder="Histórico" id="historicoart523" class="form-control" style="width:20%">
    <input type="text" placeholder="Percentual (%)" id="percentualart523" class="form-control" style="width:8%" >
    <input type="text" placeholder="Total" id="totalart523" class="form-control" style="width:8%">
    
</form>

<!--**************************Fim do form************************************-->

<!--**************************Multas*****************************-->

<form class="form-inline">
    <h5 style="font-family:arial;margin-bottom:0.67em; margin-left:0.50em; font-weight:bold;margin-top:2.0em" class="fonte-print">MULTAS:</h5>
    
    <select id="multas" name="multas" onclick="multas()" class="form-control" style="margin-left:0.50em">

        <option selected>Escolha</option>
        <option value="multacondenacao">Sobre o valor da condenação</option>
        <option value="multacausa">Sobre o valor da causa</option>
        <option value="multavalor">Valor determinado</option>
        <option value="multadiaria">Diária</option>
        <option value="semmulta">Sem multas</option>

    </select>

    <input type="text" placeholder="Histórico" id="historicocondenacaomulta" name="historicocondenacaomulta" class="form-control" style="width:20%">
    <input type="text" placeholder="Percentual (%)" id="percentualcondenacaomulta" name="percentualcondenacaomulta" class="form-control" style="width:8%">

    <input type="text" placeholder="Data da distribuição" id="datadistribuicaocausamulta" name="datadistribuicaocausamulta" class="form-control" style="width:12%">
    <input type="text" placeholder="Histórico" id="historicocausamulta" name="historicocausamulta" class="form-control" style="width:20%">
    <input type="text" placeholder="Valor da Causa" id="valorcausamulta" name="valorcausamulta" class="form-control" style="width:8%">
    <input type="text" placeholder="Percentual(%)" id="percentualcausamulta" name="percentualcausamulta" class="form-control" style="width:8%">    
    <input type="text" placeholder="Índice de correcao multa" id="indicedecorrecaocausamulta" name="indicedecorrecaocausamulta" class="form-control" style="width:15%">

    <input type="text" placeholder="Data da determinação" id="datadistribuicaovalormulta" name="datadistribuicaovalormulta" class="form-control" style="width:12%">
    <input type="text" placeholder="Histórico" id="historicovalormulta" name="historicovalormulta" class="form-control" style="width:20%">
    <input type="text" placeholder="Valor determinado" id="valordeterminadomulta" name="valordeterminadomulta" class="form-control" style="width:8%">   
    <input type="text" placeholder="Índice de correcao" id="indicedecorrecaovalormulta" id="indicedecorrecaovalormulta" class="form-control" style="width:15%">

    <input type="text" placeholder="Data de início" id="datainiciomultadiaria" name="datainiciomultadiaria" class="form-control" style="width:12%">
    <input type="text" placeholder="Data final" id="datafinalmultadiaria" name="datafinalmultadiaria" class="form-control" style="width:8%"> 
    <input type="text" placeholder="Histórico" id="historicomultadiaria" name="historicomultadiaria" class="form-control" style="width:15%">
    <input type="text" placeholder="Valor da multa diária (R$)" id="valormultadiaria" name="valormultadiaria" class="form-control" style="width:8%" >
    <input type="text" placeholder="Valor limite" id="valorlimitemulta" name="valorlimitemulta" class="form-control" style="width:8%">    
    <input type="text" placeholder="Índice correção" id="indicecorrecaomultadiaria" name="indicecorrecaomultadiaria" class="form-control" style="width:15%">

    <input type="text" placeholder="Total" id="totalmultacondenacao"  name="totalmulta" class="form-control" style="width:8%">
    <input type="text" placeholder="Total" id="totalmultacausa"  name="totalmulta" class="form-control" style="width:8%">
    <input type="text" placeholder="Total" id="totalmultadeterminado"  name="totalmulta" class="form-control" style="width:8%">
    <input type="text" placeholder="Total" id="totalmultadiaria"  name="totalmulta" class="form-control" style="width:8%">
    
</form>

<div align="center" style="margin-top:2.0em; margin-bottom:2.0em ;">
<!--
    <label for="exibir" style="margin-bottom: 1.0em; margin-right:20.4em;color: red;font-weight: bold; width:14%"> SUBTOTAL:</label>

    <input id="exibir" class = "form-control" style="margin-bottom: 1.0em; margin-right:12.3em;color: red;font-weight: bold; width:14%">
-->

<form class="form-inline">
    <div class="form-group">
      <label for="exibirtotaldevido">VALOR TOTAL DEVIDO(R$):</label>
      <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control" id="exibirtotaldevido" placeholder="" name="exibirtotaldevido" disabled>
  </div>    
</form>

</div>

<!--*************************Fim do form**********************************--> 


<input type="hidden" name = "id">

<small><div id="mensagem" align="center"></div></small>               

<div class="modal-footer">

    <!--<button type="submit" id="salvar" class="btn btn-primary">Salvar</button>-->
    <button onclick="window.print()" id="gerarrelatorio" class="btn btn-primary no-print">Gerar Relatório</button>

    <!--<a href="../rel/relatorio.php"> Relatório </a>-->



</div>

</form>

<!--****************************Fim do form principal***********************-->


<script type="text/javascript"> var pag = "<?=$pag?>" </script>

<script src = "js/ajax2.js"></script>

<script src = "js/expurgos_inflacionarios.js"></script>

<script> /* $(document).ready(function(){$("#dataevento").mask("99/99/9999");});*/</script>
