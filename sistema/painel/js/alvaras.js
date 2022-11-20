$(document).ready(function(){

    /*******************************inicio******************************/
    
    /*************************Primeira linha de lançamento**********************/
    
    //inclusão de datapickers nos eventos de datas
    
    $("#datainicialjuros,#datafinaljuros,#datafinalcorrecao,#dataevento,#datadistribuicaocausa,#datadistribuicaovalor,#custasdata,#datadistribuicaovalormulta,#datainiciomultadiaria,#datafinalmultadiaria,#datadistribuicaocausamulta").datepicker({
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
    
    //define campos de somente leitura
    
    $('#indicecorrecao').prop('readonly',true);
    $('#juros').prop('readonly', true);    
    $('#total').prop('readonly', true);
    $('#montebruto').prop('readonly',true);
    $('#montepartilhavel').prop('readonly', true);    
    $('#custasprocessuais').prop('readonly', true);
    $('#taxajudiciaria').prop('readonly', true);
    $('#taxaderegistrodeinventario').prop('readonly', true);      
    
    //fim definição de campos somente leitura
    
    //função que calcula o índice de correção e define o valor da parcela com a mudança da data final
    
    $('#datafinalcorrecao').change(function(){
    
        const encoge = new Map([
    
            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         
    
            ]);
    
        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var start = $('#dataevento').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))      
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
            $('#juros').val(juros);
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
            $('#juros').val(juros);
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
    
    
    //função que calcula o valor total da parcela e o índice com sua mudança
    
    $('#dataevento').change(function(){
    
        const encoge = new Map([
    
            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         
    
            ]);
    
        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var start = $('#dataevento').datepicker({dateFormat: 'dd-MM-yyyy'}).val()        
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))          
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
    
        const encoge = new Map([
    
            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         
    
            ]);
    
        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var start = $('#datadistribuicaocausa').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))      
        $('#indicedecorrecaohonorarioscausa').val(result.toFixed(7));
    
        calculahonorarioscausa()      
    
    })
    
    
    
    //função de que os honorários com base no valor fixo
    
    $('#datadistribuicaovalor').change(function(){
    
        const encoge = new Map([
    
            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         
    
            ]);
    
        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var start = $('#datadistribuicaovalor').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))      
        $('#indicedecorrecaohonorariosvalor').val(result.toFixed(7));
    
        calculahonorariosdeterminado()      
    
    })
    
    
    //função que calcula o valor das custas
    
    $('#custasdata').change(function(){
    
        const encoge = new Map([
    
            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         
    
            ]);
    
        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var start = $('#custasdata').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))      
        $('#indicecorrecaocustas').val(result.toFixed(7))
    
        calculacustas()      
    
    })
    
    
    //função que calcula o valor da multa com base no valor da causa
    
    $('#datadistribuicaocausamulta').change(function(){
    
        const encoge = new Map([
    
            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         
    
            ]);
    
        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        
        var start = $('#datadistribuicaocausamulta').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        
        var resultStart = encoge.get(start)
        
        var resultEnd = encoge.get(end)
    
        var result = (encoge.get(start)/encoge.get(end))
        
        $('#indicedecorrecaocausamulta').val(result.toFixed(7))
        
        calculamultacausa()     
    
    })
    
    
    //função que calcula o valor da multa com base no valor fixado
    
    $('#datadistribuicaovalormulta').change(function(){
    
        const encoge = new Map([
    
            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         
    
            ]);
    
        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        
        var start = $('#datadistribuicaovalormulta').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        
        var resultStart = encoge.get(start)
        
        var resultEnd = encoge.get(end)
    
        var result = (encoge.get(start)/encoge.get(end))
        
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
        dateFormat: 'dd-mm-yy',
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
    
            const encoge = new Map([
    
                ['01-01-2021','1.1528566'],
                ['01-02-2021','1.1497523'],
                ['01-03-2021','1.1404010'],
                ['01-04-2021','1.1306772'],
                ['01-05-2021','1.1263969'],
                ['01-06-2021','1.1156863'],
                ['01-07-2021','1.1090321'],
                ['01-08-2021','1.0978342'],
                ['01-09-2021','1.0882575'],
                ['01-10-2021','1.0753533'],
                ['01-11-2021','1.0630222'],
                ['01-12-2021','1.0541672'],
                ['01-01-2022','1.0465270'],
                ['01-02-2022','1.0395625'],
                ['01-03-2022','1.0292698'],
                ['01-04-2022','1.0119652'],
                ['01-05-2022','1.0015491'],
                ['01-06-2022','0.9970623'],
                ['01-07-2022','0.9909186'],
                ['01-08-2022','0.9969000'],
                ['01-09-2022','1.0000000']         
    
                ]);
    
            var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
    
            var start = $('#dataevento'+count).datepicker({dateFormat: 'dd-MM-yyyy'}).val()
            var resultStart = encoge.get(start)
            var resultEnd = encoge.get(end)
            var result = (encoge.get(start)/encoge.get(end))          
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
    
        const encoge = new Map([
    
            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         
    
            ]);
    
        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
    
        var count1 = count                 
    
        while(count>=2){    
    
            var start = $('#dataevento'+count).datepicker({dateFormat: 'dd-MM-yyyy'}).val()
            var resultStart = encoge.get(start)
            var resultEnd = encoge.get(end)
            var result = (encoge.get(start)/encoge.get(end))      
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
    
         $('#historicocausa').show()
         $('#valorcausa').show()
         $('#percentualcausa').show()
         $('#datadistribuicaocausa').show()
         $('#indicedecorrecaohonorarioscausa').show()
         $('#honorariostotalcausa').show()                                                 
    
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
    
         $('#historicocondenacao').hide()
         $('#percentualcondenacao').hide()
         $('#honorariostotalcondenacao').hide()
         $('#honorariostotalcausa').hide()     
    
    
     } else {
    
    
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
    
    
    $("#custas").click(function(){
    
        var custas = document.getElementById('custas').value      
    
        if(custas=="custasiniciais" || custas=="custascomplementar" ||custas=="custasapelacao" || custas =="custascumprimento" || custas =="custasoutros"){ 
    
            $('#custasdata').show()
            $('#custashistorico').show()
            $('#custasvalor').show()
            $('#indicecorrecaocustas').show()
            $('#custasatualizadas').show() 
    
        } else {
    
            $('#custasdata').hide()
            $('#custashistorico').hide()
            $('#custasvalor').hide()
            $('#indicecorrecaocustas').hide()
            $('#custasatualizadas').hide()            
    
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
    
    
    $("#honorariosmultaart523").click(function(){
    
        var honorariosmultaart523 = document.getElementById('honorariosmultaart523').value      
    
        if(honorariosmultaart523=="honorariosmultaart523"){ 
    
            $('#historicoart523').show()
            $('#percentualart523').show()
            $('#totalart523').show()
    
    
        } else {
    
            $('#historicoart523').hide()
            $('#percentualart523').hide()
            $('#totalart523').hide()
            
    
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
    $('#indicecorrecaomultadiaria').prop('readonly', true);
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
    $('#valorlimitemulta').hide()
    $('#datainiciomultadiaria').hide()
    $('#datafinalmultadiaria').hide()
    $('#indicecorrecaomultadiaria').hide()        
    
    $('#totalmultacondenacao').hide()
    $('#totalmultacausa').hide()
    $('#totalmultadeterminado').hide()
    $('#totalmultadiaria').hide()  
    
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
    
         $('#historicovalormulta').hide()
         $('#valordeterminadomulta').hide()
         $('#datadistribuicaovalormulta').hide()
         $('#indicedecorrecaovalormulta').hide()
         $('#totalmultadeterminado').hide()
         $('#totalmultadiaria').hide()
         $('#totalmultacondenacao').hide()  
    
         $('#historicomultadiaria').hide()
         $('#valormultadiaria').hide()
         $('#valorlimitemulta').hide()
         $('#datainiciomultadiaria').hide()
         $('#datafinalmultadiaria').hide()
         $('#indicecorrecaomultadiaria').hide()
    
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
    
         $('#historicomultadiaria').hide()
         $('#valormultadiaria').hide()
         $('#valorlimitemulta').hide()
         $('#datainiciomultadiaria').hide()
         $('#datafinalmultadiaria').hide()
         $('#indicecorrecaomultadiaria').hide()               
    
    
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
    
         $('#historicomultadiaria').hide()
         $('#valormultadiaria').hide()
         $('#valorlimitemulta').hide()
         $('#datainiciomultadiaria').hide()
         $('#datafinalmultadiaria').hide()
         $('#indicecorrecaomultadiaria').hide()    
    
    
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
         $('#valorlimitemulta').show()
         $('#datainiciomultadiaria').show()
         $('#datafinalmultadiaria').show()
         $('#indicecorrecaomultadiaria').show()
         $('#totalmultadiaria').show() 
    
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
         $('#valorlimitemulta').hide()
         $('#datainiciomultadiaria').hide()
         $('#datafinalmultadiaria').hide()
         $('#indicecorrecaomultadiaria').hide()
         $('#totalmultacondenacao').hide()
         $('#totalmultacausa').hide()
         $('#totalmultadeterminado').hide()
         $('#totalmultadiaria').hide()
    
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
    
        var valordeterminado = $('#valordeterminado').val()
        var indicecorrecaodeterminado = $('#indicedecorrecaohonorariosvalor').val() 
        var totalhonorarioscondenacao = valordeterminado*indicecorrecaodeterminado
        $('#honorariostotaldeterminado').val(totalhonorarioscondenacao.toFixed(2))
    
    }
    
    function calculavalortotaldevido(){
    
        var subtotal = Number.parseFloat(document.getElementById('exibir').value)
        var totalcustas =  Number.parseFloat($('#custasatualizadas').val())
        var totalhonorarios = Number.parseFloat($('#honorariostotalcondenacao').val())
        var totalart523 = Number.parseFloat($('#totalart523').val())
        var totalmulta = Number.parseFloat($('#totalmultacausa').val())
        var valortotaldevido = subtotal+totalcustas+totalhonorarios+totalart523+totalmulta
    
        if(isNaN(valortotaldevido)){
    
         $('#exibirtotaldevido').val(0.0) 
     } else{
    
        $('#exibirtotaldevido').val(valortotaldevido.toFixed(2)) 
    
    }     
    }
    
    })
    
    /***********************************************************************/
    
    
    