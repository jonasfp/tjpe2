
/* Salvar calculos modulo custas*/

$("#formCustasProcesso").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
    
    alert(pag)
      
    $.ajax({
        url: 'paginas/' + pag + "/salvar_processos.php",
        type: 'POST',
        data: formData,
        
            success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

                        
             
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

});



$("#formCustasParametros").submit(function () {

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

});

$("#formCustasCalculadas").submit(function () {


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


});

$("#formCustasTaxa").submit(function () {

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

});


$("#formCustasEmbargos").submit(function () {
      
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

});

$("#formCustasExtras").submit(function () {

      
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

});
