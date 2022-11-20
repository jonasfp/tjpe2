<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

$pag = 'alvaras';

?>

<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="css/relatorio.css">

<!--**********************Ínicio form principal******************************-->

<!--**********************Tabela dados do processo***************************-->
<div style="display: flex; justify-content: center; margin-bottom:1.0em;"> <img src="../img/tjpe.png"> </div>
<h3 style="text-align:center">TRIBUNAL DE JUSTIÇA DE PERNAMBUCO</h3>

<h4 style="text-align:center">CONTADORIA</h4>
<h5 style="text-align:center; margin-bottom: 3.0em;">FORUM DES. RODOLFO AURELIANO - AV. DES. GUERRA BARRETO, S/N - ILHA
    DO LEITE - RECIFE /PE</h5>

<form method="post" id="formCiveis">

    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-left fonte-print" style="width:15%">NÚMERO DO PROCESSO </th>
                <th class="text-left fonte-print" style="width:15%">VARA</th>
                <th class="text-left fonte-print" style="width:10%">INVENTARIANTE</th>
                <th class="text-left fonte-print" style="width:10%">INVENTARIADO</th>


            </tr>
        </thead>

        <tbody>
            <tr>

                <td>

                    <input type="text" class="form-control" id="processo" name="processo"
                        placeholder="Número do processo">
                </td>

                <td>

                    <div class="form-group">
                        <select class="form-control sel2" id="vara" name="vara" style="width:100%;">

                            <?php 
                                    $query = $pdo->query("SELECT * FROM vara ORDER BY id asc");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    $total_reg = @count($res);
                                    if($total_reg > 0){
                                        for($i=30; $i < 35; $i++){
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

                    <input type="text" class="form-control" id="inventariante" name="inventariante"
                        placeholder="Inventariante">
                </td>

                <td>

                    <input type="text" class="form-control" id="inventariado" name="inventariado"
                        placeholder="Inventariado">
                </td>


            </tr>

        </tbody>
    </table>

    <!--*********************Fim tabela dados do processo**********************-->

    <!--**********************Tabela correção+juros****************************-->

    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-left fonte-print" style="width: 40%;">CORREÇÃO MONETÁRIA </th>
                <th class="text-left fonte-print" style="width: 30%;">TERMO FINAL</th>
                <th class="text-left fonte-print" style="width: 30%;">COM MEAÇÃO</th>

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

                    <input placeholder="Data final" type="text" id="datafinalcorrecao" name="datafinalcorrecao"
                        class="form-control">



                </td>

                

                <td>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="option1">
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="option2">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                    
                    
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
                <th class="text-left fonte-print">HISTÓRICO</th>
                <th class="text-left fonte-print" style="width:10%">VALOR (R$)</th>
                <th class="text-left fonte-print" style="width:10%">CORREÇÃO MONETÁRIA</th>
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

                    <input type="text" class="form-control" id="indicecorrecao" name="indicecorrecao"
                        placeholder="Correção Monetária">
                </td>

                <td>

                    <!------------------Problema no banco corrigir no do ID--------->

                    <input type="text" class="form-control" id="total" name="total" placeholder="Total">
                </td>

                <td>

                    <div class="btn-group btn-group-sm no-print">
                        <button type="button" form="formCiveis" id="inserirLinha" name="inserirLinha"><i
                                class="fa fa-plus" aria-hidden="true" title="Inserir linha"></i></button>
                    </div>

                    <div class="btn-group btn-group-sm no-print">
                        <button type="button" form="formCiveis" id="atualizarLinha"><i class="fa fa-refresh"
                                aria-hidden="true" title="Atualizar linha"></i></button>
                    </div>

                    <div class="btn-group btn-group-sm no-print">
                        <button type="button" form="formCiveis" id="removerLinha"><i class="fa fa-minus"
                                aria-hidden="true" title="Remover linha"></i></button>
                    </div>
                    <div class="btn-group btn-group-sm no-print">
                        <button type="submit" id="salvarLinha" class="salvarLinha"><i class="fa fa-save"
                                title="Salvar linha"></i></button>
                    </div>

                </td>

        </tbody>

    </table>

    <!--**********************Fim tabela parcelas****************************-->

    <!--<div align="right"><h4 id="exibir" style="margin-bottom: 1.0em; margin-right: 18em;color: red;font-weight: bold;"><h4></div>-->


    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-left fonte-print" style="width: 40%;">MONTE BRUTO(R$) </th>
                <th class="text-left fonte-print" style="width: 30%;">MONTE PARTILHÁVEL(R$)</th>                

            </tr>
        </thead>

        <tbody>

            <tr>

                <td>

                <input placeholder="Monte bruto" type="text" id="montebruto" name="montebruto"
                        class="form-control"> 

                </td>

                <td>

                    <input placeholder="Monte partilhável" type="text" id="montepartilhavel" name="montepartilhavel"
                        class="form-control">



                </td>


            </tr>

        </tbody>

    </table>

    <div style="margin-bottom: 15px ;">

    <form class="form-inline">
        <h5 style="font-family:arial;margin-bottom:0.67em; margin-left:0.50em; font-weight:bold;margin-top:2.0em;"
            class="fonte-print">CUSTAS PROCESSUAIS PAGAS:</h5>
        <select id="custas" name="custas" onclick="custas()" class="form-control" style="margin-left:0.50em">
            <option selected>Escolha</option>

            <option value="custasiniciais">Iniciais</option>
            <option value="custascomplementar">Complementares</option>            
            <option value="semcustas">Sem custas</option>

        </select>

        <input type="text" placeholder="Data" id="custasdata" class="form-control" style="width:12%">
        <input type="text" placeholder="Histórico" id="custashistorico" class="form-control" style="width:20%">
        <input type="text" placeholder="Valor" id="custasvalor" class="form-control" style="width:8%">
        <input type="text" placeholder="Índice correção" id="indicecorrecaocustas" class="form-control"
            style="width:15%">
        <input type="text" placeholder="Custas atualizadas" id="custasatualizadas" class="form-control"
            style="width:8%">

    </form>
      


    </div>

    
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-left fonte-print" style="width: 40%;">CUSTAS PROCESSUAIS(R$) </th>
                <th class="text-left fonte-print" style="width: 30%;">TAXA JUDICIÁRIA(R$)</th>
                <th class="text-left fonte-print" style="width: 30%;">TAXA DE REGISTRO DE INVENTÁRIO(R$)</th>                 

            </tr>
        </thead>

        <tbody>

            <tr>

                <td>

                <input placeholder="Custas processuais" type="text" id="custasprocessuais" name="custasprocessuais"
                        class="form-control"> 

                </td>

                <td>

                    <input placeholder="Taxa judiciária" type="text" id="taxajudiciaria" name="taxajudiciaria"
                        class="form-control">



                </td>

                <td>

                    <input placeholder="Taxa de registro de inventário" type="text" id="taxaderegistrodeinventario" name="taxaderegistrodeinventario"
                        class="form-control">



                </td>



            </tr>

        </tbody>

    </table>
    
    <!--
    
    <div align="right" class="margin-print" style="margin-right:12em ;">
        <!--
    <label for="exibir" style="margin-bottom: 1.0em; margin-right:20.4em;color: red;font-weight: bold; width:14%"> SUBTOTAL:</label>

    <input id="exibir" class = "form-control" style="margin-bottom: 1.0em; margin-right:12.3em;color: red;font-weight: bold; width:14%">


        <form class="form-inline" style="margin-bottom: 30px;">
            <div class="form-group">
                <label for="exibir">MONTE BRUTO(R$):</label>
                <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control"
                    id="exibir" placeholder="" name="exibir" disabled>
            </div>
            
        </form>



    </div>

    -->


    <!--**************************Honorários*****************************-->

    <!--***********************Fim do form****************************-->


    <!--***********************Custas*************************************-->

    

    <!--******************Fim do form******************************-->



    <!--**************************Multas*****************************-->


    <div align="center" style="margin-top:2.0em; margin-bottom:2.0em ;">
        <!--
    <label for="exibir" style="margin-bottom: 1.0em; margin-right:20.4em;color: red;font-weight: bold; width:14%"> SUBTOTAL:</label>

    <input id="exibir" class = "form-control" style="margin-bottom: 1.0em; margin-right:12.3em;color: red;font-weight: bold; width:14%">
-->

        <form class="form-inline">
            <div class="form-group">
                <label for="exibirtotaldevido">VALOR TOTAL DEVIDO AO TJPE(R$):</label>
                <input type="text" style="color: red;font-weight: bold; font-size: 16px;" class="form-control"
                    id="exibirtotaldevido" placeholder="" name="exibirtotaldevido" disabled>
            </div>
        </form>

    </div>

    <!--*************************Fim do form**********************************-->


    <input type="hidden" name="id">

    <small>
        <div id="mensagem" align="center"></div>
    </small>

    <div class="modal-footer">

        <!--<button type="submit" id="salvar" class="btn btn-primary">Salvar</button>-->
        <button onclick="window.print()" id="gerarrelatorio" class="btn btn-primary no-print">Gerar Relatório</button>

        <!--<a href="../rel/relatorio.php"> Relatório </a>-->



    </div>

</form>

<!--****************************Fim do form principal***********************-->


<script type="text/javascript">
var pag = "<?=$pag?>"
</script>

<script src="js/ajax2.js"></script>

<script src="js/alvaras.js"></script>

<script>
/* $(document).ready(function(){$("#dataevento").mask("99/99/9999");});*/
</script>