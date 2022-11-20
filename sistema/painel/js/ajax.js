
$(document).ready(function(){
	listar();	
});

function listar(){
	$.ajax({
		//url:'paginas/'+ pag + '/calculos.php',        
        url:'paginas/'+ pag + '/listar.php',
		method:'POST',
		data:$('#form').serialize(),
		dataType:"html",

		success:function(result){
			$("#listar").html(result);
			$('#mensagem-excluir').text('');
		}

	});
}


function excluir(id){
    $.ajax({
        url: 'paginas/' + pag + "/excluir.php",
        method: 'POST',
        data: {id},
        dataType: "text",

        success: function (mensagem) {            
            if (mensagem.trim() == "Excluído com Sucesso") {                
                listar();                
            } else {
                    $('#mensagem-excluir').addClass('text-danger')
                    $('#mensagem-excluir').text(mensagem)
                }

        },      

    });
}

function inserir(){
	
$('#mensagem').text('')
$('#titulo_inserir').text('Inserir Registro');
$('#modalForm').modal('show');
limparCampos();
	
}

/*Salvar modal cadastro de usuário*/


$("#form").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: 'paginas/' + pag + "/salvar.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {
                $('#btn-fechar').click();
                listar();
               
            } else {

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            }
        },

        cache: false,
        contentType: false,
        processData: false,

    });
});



//function inserirLinha(){

//$("#jonas").append($("#modelo-linha").html())

//var count=1;
//count++;

//$("#jonas>tbody").append('<tr id = "linha'+count+'""><td>'+count+'</td><td> <input type="text" class="form-control" placeholder="Data"> </td> <td><input type="text" class="form-control" placeholder="Histórico"></td> <td><input type="text" class="form-control" placeholder="Valor"></td> <td><input type="text" class="form-control" placeholder="Correção Monetária"></td> <td><input type="text" class="form-control" placeholder="Juros Moratórios"></td> <td><input type="text" class="form-control" placeholder="Total"></td><td><a href="#" onclick="inserirLinha()" id="inserirLinha" title="Inserir nova linha"><i class="fas fa-plus" aria-hidden="true"></i></a> <a href="#" onclick="removerLinha()" title="Remover linha"><i class="fa fa-trash-o"aria-hidden="true"></i></a> </td></tr>');

//$("#jonas>tbody").append('<tr><td></td><td> <input type="text" class="form-control" placeholder="Data"> </td> <td><input type="text" class="form-control" placeholder="Histórico"></td> <td><input type="text" class="form-control" placeholder="Valor"></td> <td><input type="text" class="form-control" placeholder="Correção Monetária"></td> <td><input type="text" class="form-control" placeholder="Juros Moratórios"></td> <td><input type="text" class="form-control" placeholder="Total"></td><td><a href="#" onclick="inserirLinha()" id="inserirLinha" title="Inserir nova linha"><i class="fas fa-plus" aria-hidden="true"></i></a> <a href="#" onclick="removerLinha()" title="Remover linha"><i class="fa fa-trash-o"aria-hidden="true"></i></a> </td></tr>');


//$("#jonas>tbody").insertAfter($("num_id").closest('tr'));

    //var i=10
   // var newRow = "#jonas>tbody"
    //var cols = '<tr id ="linha"></tr>'
    //cols += '<td></td>'
   // cols += '<td><input type="text" class="form-control" placeholder="Data"></td>';
   // cols += '<td><input type="text" class="form-control" placeholder="Histórico"></td>';
    //cols += '<td><input type="text" class="form-control" placeholder="Valor"></td>';
   // cols += '<td><input type="text" class="form-control" placeholder="Correção Monetária"></td>';
    //cols += '<td><input type="text" class="form-control" placeholder="Juros Moratórios"></td>';
   // cols += '<td><input type="text" class="form-control" placeholder="Total"></td>';
    //cols += '<td><a href="#" onclick="inserirLinha()" id="inserirLinha" title="Inserir nova linha"><i class="fas fa-plus" aria-hidden="true"></i></a> <a href="#" onclick="removerLinha()" title="Remover linha"><i class="fa fa-trash-o"aria-hidden="true"></i></a></td>';
    
   // $(newRow).append(cols)
   // $(newRow).insertAfter($().closest('tr'));

   //return false

//}


//function removerLinha(){

//$(this).parents('tr').remove()
//}





