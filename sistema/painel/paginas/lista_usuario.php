<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

$pag = 'lista_usuario';


 ?>

 <div class="">
    <a class = "btn btn-primary" onclick="inserir()" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Novo usuário</a>
 </div>

     
<div class = "bs-example widget-shadow" style="padding: 15px" id="listar">

</div>


<!-- Modal Inserir-->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="titulo_inserir"></span></h4>
                <button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            
            <form method="post" id="form">

            <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>                    
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Matricula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Digite a matricula" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nível</label>
                        <input type="text" class="form-control" id="nivel" name="nivel" placeholder="Digite o nível (Administrador ou Servidor)" required>
                    </div>                                                   
                                     
                    <input type="hidden" name = "id">

                <small><div id="mensagem" align="center"></div></small>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </div> 

            </form>
            
        </div>
    </div>
</div>

<script type="text/javascript">

    var pag = "<?=$pag?>"  
   
</script>

<script src = "js/ajax.js"></script>



 