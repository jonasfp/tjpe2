<?php 

require_once('../../../conexao.php');


$query = $pdo->query("SELECT encoge, DATE_FORMAT(data,'%m-%Y') AS nicedata FROM indice_encoge");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

$indice = array();

if($total_reg > 0){

echo <<<HTML

    <table class="table table-hover" id="indice">
    <thead>

    <tr>

    <th>Data</th>
    <th>Valor</th>
           
    </tr>
    </thead>
    <tbody>
HTML;


for($i=0; $i<$total_reg; $i++){
foreach ($res[$i] as $key => $value){

		$data = $res[$i]['nicedata'];
        $encoge = $res[$i]['encoge'];
        $indice[$data] = $encoge;
}

echo <<<HTML

<tr>

 <td>{$data}</td>
 <td>{$encoge}</td>
 
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

<script>
    
var jsonJS = <?php echo json_encode($indice)?>

var data1 = '2021-12-01'
var data2 = '2022-05-01'
var valor1 = parseFloat(jsonJS[data1])
var valor2 = parseFloat(jsonJS[data2])

alert(valor1/valor2)


</script>