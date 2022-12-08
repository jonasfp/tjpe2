
/* Salvar calculos modulo custas*/

$("#formCustasProcesso").submit(function (event) { 

    event.preventDefault();
    var formData = new FormData(this);
        
    $.ajax({
        url: 'paginas/' + pag + "/salvar_processos.php",
        type: 'POST',
        data: formData,
        
            success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

                 listar()

            }

            else {

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)

               
            } 
        },

        cache: false,
        contentType: false,
        processData: false,

    });

    $('.salvarProcesso').prop('disabled', true);
    $('.salvarProcesso').css("backgroundColor", "grey");

});


$("#formCustasParametros").submit(function (event) {
           
    if( $('.salvarProcesso').prop('disabled') == false){

        alert("O número do processo, vara e devedor(es) devem ser salvos antes dos parâmetros!")
    
    } else {

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
        url: 'paginas/' + pag + "/salvar_parametros.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

            listar()                      
               
            }

            else {

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            } 
        },

        cache: false,
        contentType: false,
        processData: false,

    });



    $('.salvarParametrosCustas').prop('disabled', true);
    $('.salvarParametrosCustas').css("backgroundColor", "grey");

    }

});

$("#formCustasCalculadas").submit(function (event) {

    if( $('.salvarProcesso').prop('disabled') == false){

        alert("O número do processo, vara e devedor(es) devem ser salvos antes dos parâmetros!")
    
    } else {

    event.preventDefault();
    var formData = new FormData(this); 
    $.ajax({
        url: 'paginas/' + pag + "/salvar_calculadas.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

                listar()
                
            $('#dataeventocustascalculadas').val('');
            $('#historicocustascalculadas').val('');
            $('#custasprocessuaiscalculadas').val('');
            $('#taxajudiciariacalculada').val('');
            $('#custasprocessuaisatualizadas').val('');
            $('#taxajudiciariaatualizada').val('');
            $('#totalcustascalculadasatualizadas').val('');
                     
    
            }

            else {
               

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            } 
        },

        cache: false,
        contentType: false,
        processData: false,

    });


    }  


});

$("#formCustasTaxa").submit(function (event) {

    if( $('.salvarProcesso').prop('disabled') == false){

        alert("O número do processo, vara e devedor(es) devem ser salvos antes dos parâmetros!")
    
    } else {

    event.preventDefault();
    var formData = new FormData(this);   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_custas_taxas.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

             listar()

             $('#dataeventocustastaxa').val('');
             $('#historicocustastaxa').val('');
             $('#valorcustastaxa').val('');
             $('#custasprocessuaiscustastaxa').val('');
             $('#taxajudiciariacustastaxa').val('');
             $('#totalcustastaxa').val('');
               
            }

            else {

              

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            } 
        },

        cache: false,
        contentType: false,
        processData: false,

    });

    } 

});


$("#formCustasEmbargos").submit(function (event) {

    if( $('.salvarProcesso').prop('disabled') == false){

        alert("O número do processo, vara e devedor(es) devem ser salvos antes dos parâmetros!")
    
    } else {
      
    event.preventDefault();
    var formData = new FormData(this);
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_embargos.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

              listar()

              $('#dataeventoembargos').val('')
              $('#historicoembargos').val('')
              $('#valorembargos').val('')
              $('#custasprocessuaisembargos').val('')
              $('#taxajudiciariaembargos').val('')
              $('#totalembargos').val('')
               
            }

            else {

                 
                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            } 
        },

        cache: false,
        contentType: false,
        processData: false,

    });

    }  

});

$("#formCustasExtras").submit(function (event) {

    if( $('.salvarProcesso').prop('disabled') == false){

        alert("O número do processo, vara e devedor(es) devem ser salvos antes dos parâmetros!")
    
    } else {
      
    event.preventDefault();
    var formData = new FormData(this);   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_extras.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

            listar()

            $('#dataeventoextras').val('')
            $('#historicoextras').val('')
            $('#quantidadeextras').val('')
            $('#valorextras').val('')
            $('#totalextras').val('')
               
               
            }

            else {

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)               

            } 
        },

        cache: false,
        contentType: false,
        processData: false,

    });

    }  

});


function listar(){

    $.ajax({
        //url:'paginas/'+ pag + '/calculos.php',        
        url:'paginas/modulo_custas_lista/listar.php',
        method:'POST',
        data:$('#form').serialize(),
        dataType:"html",
        
        success:function(result){
            
            $("#listar").html(result);
            $('#mensagem-excluir').text('');
        }
       
    });
}