/* Salvar calculos civeis*/

$("#formCiveisProcessos").submit(function () {

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

$('.salvarLinhaProcesso').prop('disabled', true);
$('.salvarLinhaProcesso').css("backgroundColor", "grey");


});

$("#formCiveisParametros").submit(function () {

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

$('.salvarLinhaParametros').prop('disabled', true);
$('.salvarLinhaParametros').css("backgroundColor", "grey");


});

$("#formCiveisParcelas").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_parcelas.php",
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

$('.salvarLinha').prop('disabled', true);
$('.salvarLinha').css("backgroundColor", "grey");

});

$("#formCiveisHonorariosCondenacao").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_honorarios_condenacao.php",
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


$("#formCiveisHonorariosCausa").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);

    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_honorarios_causa.php",
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

$("#formCiveisHonorariosDeterminado").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_honorarios_determinado.php",
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


$("#formCiveisCustas").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_custas.php",
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

$("#formCiveisHonorariosMulta").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_honorarios_multa_523.php",
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

$("#formCiveisMultasCondenacao").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
   
    $.ajax({
        url: 'paginas/' + pag + "/salvar_multa_condenacao.php",
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


$("#formCiveisMultasCausa").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_multa_causa.php",
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


$("#formCiveisMultasDeterminado").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_multa_determinado.php",
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

$("#formCiveisMultasDiaria").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar_multa_diaria.php",
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

