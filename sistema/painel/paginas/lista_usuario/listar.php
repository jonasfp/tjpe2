<?php 
require_once('../../../conexao.php');
$tabela = 'usuarios';

$query = $pdo->query("SELECT * FROM $tabela ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg>0){


echo <<<HTML

    <table class="table table-hover" id="tabela">
    <thead>
    <tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Matricula</th>
    <th>Nível</th>  
    <th>Ações</th>    
    </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$total_reg;$i++){
    foreach ($res[$i] as $key => $value) {
        $id = $res[$i]['id'];
        $nome = $res[$i]['nome'];
        $email = $res[$i]['email'];
        $matricula = $res[$i]['matricula'];
        $nivel = $res[$i]['nivel'];        
    }

echo <<<HTML
<tr>
 <td>{$nome}</td>
 <td>{$email}</td>
 <td>{$matricula}</td>
 <td>{$nivel}</td> 

 <td>
        <big><a href="#" onclick="editar()" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

        <big><a href="#" onclick="mostrar()" title="Ver Dados"><i class="fa fa-info-circle text-secondary"></i></a></big>



        <li class="dropdown head-dpdn2" style="display: inline-block;">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

        <ul class="dropdown-menu" style="margin-left:-230px;">

        <li>

        <div class="notification_desc2">

        <p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
        </div>

        </li> 

        </ul>

        </li>       


        </td>
</tr>
HTML;

}

echo <<<HTML
</tbody>
<small><div align = "center" id="mensagem-excluir"></div></small>
</table>
HTML;

} else {

    echo 'Não possui registro cadastrado!';
}

?>
