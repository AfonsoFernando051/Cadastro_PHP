
<?php

use function Safe\odbc_result;

include_once('cadastrar.php');

 
function getDataDemandas(){
    
    $data = array();

    $data[0] = $_POST["id_demanda"];
    $data[1] = $_POST["descricao_demanda"];
    $data[2] = $_POST["custo"];
    $data[3] = $_POST["id_usuario"];
    $data[4] = $_POST["id_atendente"];
    $data[5] = $_POST["data_cadastro"];
    $data[6] = $_POST["data_atendimento"];
    $data[7] = $_POST["data_termino"];
    $data[8] = $_POST["observacoes"];

    return $data;
}


if(isset($_POST['submit'])){ 
  
    $infoDemandas = getDataDemandas();
    $insertDemandas = "INSERT INTO demanda1(id_demanda, descricao_demanda, custo, id_usuario, 
    id_atendente,data_cadastro,data_atendimento,data_termino,observacoes ) VALUES ('$infoDemandas[0]', 
    '$infoDemandas[1]','$infoDemandas[2]','$infoDemandas[3]','$infoDemandas[4]','$infoDemandas[5]',
    '$infoDemandas[6]','$infoDemandas[7]','$infoDemandas[8]')";  
    
    echo $insertDemandas;

    $resultDemandas = sqlsrv_query($conn, $insertDemandas,$infoDemandas ) or die(" Falha " . $insertDemandas);

}

if(isset($_POST['search'])){ 
  
$tsql = "SELECT * FROM demanda1";  
$stmt = sqlsrv_query($conn, $tsql ) or die(" Falha " . $search);
if($stmt === false){
echo "erro";
die(print_r(sqlsrv_errors(), true));
}

$row = sqlsrv_fetch_array($stmt);

print_r( "<li>" . "<ul>" . $row["id_demanda"] . "</ul>"."<ul>".$row["descricao_demanda"]
."</ul>" ."<ul>".$row["custo"]."</ul>"."<ul>". $row["id_atendente"]."</ul>" ."</li></br>");

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
}

if(isset($_POST['update'])){ 
   
    $infoDemandas = getDataDemandas();

    $update = "UPDATE demanda1 SET id_demanda = '$infoDemandas[0]',  descricao_demanda = '$infoDemandas[1]',
     custo = '$infoDemandas[2]', id_usuario = '$infoDemandas[3]', id_atendente = '$infoDemandas[4]',
     data_cadastro = '$infoDemandas[5]', data_atendimento = '$infoDemandas[6]', data_termino = '$infoDemandas[7]',
     observacoes = '$infoDemandas[8]' WHERE id_demanda =  '$infoDemandas[0]'";  

    $resultDemandas = sqlsrv_query($conn, $update,$infoDemandas ) or die(" Falha " . $infoDemandas);
    echo "<center><font color = red><p>Dados alterados com sucesso</p>";

}

if(isset($_POST['delete'])){ 

    $infoDemandas = getDataDemandas();
    $deleteDemandas = "DELETE FROM demanda1 WHERE id_demanda = '$infoDemandas[0]'";  
    $resultDeleteDemandas = sqlsrv_query($conn, $deleteDemandas,[$_POST["id_demanda"]] ) or die(" Falha " . $deletetDemandas);
    
    echo $resultDeleteDemandas;
}

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro - PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>

<body>

<center>
    <form  name=form1 method="POST" action="cadastroDemandas.php">
    <p > Cadastro de Demandas</p>
     <table>
    <tr><td>Registro de Demanda(ID):<td><input name='id_demanda' type=number size = 3 required></td></tr>	
	<tr><td>Descrição demanda:<td><input name="descricao_demanda" type=text size = 60 required></td></tr>
    <tr><td>Custo:<td><input name="custo" type=text size = 60 required></td></tr>	
	<tr><td>Usuario(ID)<td><input name="id_usuario" type=text size = 60 required></td></tr>	
	<tr><td>Atendente(ID)<td><input name="id_atendente" type=text size = 60 required></td></tr>	
	<tr><td>Data de Cadastro: <td><input name="data_cadastro" type="date" size = 60 required></td></tr>	
	<tr><td>Data de Previsão de Atendimento: <td><input name="data_atendimento" type="date" size = 60 required></td></tr>	
	<tr><td>Data de Previsão de Termino: <td><input name="data_termino" type="date" size = 60 required></td></tr>	
	<tr><td>Observações: <td><input name="observacoes" type="text" size = 60 required></td></tr>	

	<tr>
	</table>
    <input name = "submit" type = "submit" id="submit" value = "Incluir">
    </form>

    <form  name=form2 method="POST" action="cadastroDemandas.php">
    <p > Atualização de Demandas</p>
     <table>
    <tr><td>Registro de Demanda(ID):<td><input name='id_demanda' type=number size = 3 required></td></tr>	
	<tr><td>Descrição demanda:<td><input name="descricao_demanda" type=text size = 60 required></td></tr>
    <tr><td>Custo:<td><input name="custo" type=text size = 60 required></td></tr>	
	<tr><td>Usuario(ID)<td><input name="id_usuario" type=text size = 60 required></td></tr>	
	<tr><td>Atendente(ID)<td><input name="id_atendente" type=text size = 60 required></td></tr>	
	<tr><td>Data de Cadastro: <td><input name="data_cadastro" type="date" size = 60 required></td></tr>	
	<tr><td>Data de Previsão de Atendimento: <td><input name="data_atendimento" type="date" size = 60 required></td></tr>	
	<tr><td>Data de Previsão de Termino: <td><input name="data_termino" type="date" size = 60 required></td></tr>	
	<tr><td>Observações: <td><input name="observacoes" type="text" size = 60 required></td></tr>	

	<tr>
	</table>
    <input name = "update" type = "submit" id="update" value = "Atualizar">
    </form>

    <form  name=form3 method="POST" action="cadastroDemandas.php">
    <p > Pesquisa de Demandas</p>
     <table>
	</table>
    <input name = "search" type = "submit" id="search" value = "Pesquisar">
    </form>

    <div>
    <p > Exclusão de Demandas</p>
     <table>
    <tr><td>Registro de Demanda(ID):<td><input name='id_demanda' type=number size = 3 required></td></tr>	
	<tr>
	</table>
    <input name = "delete" type = "submit" id="delete" value = "Deletar">
    </div>


<br>
<h1>Acessar páginas de cadastros: </h1>
    <a href="./home.html">Home</a>
	<a href="./cadastroUsuario.php">Cadastro de usuário;</a>
	<a href="./cadastroAtendente.php">Cadastro de Atendente;</a>
	<a href="./cadastroSetor.php">Cadastro de Setor;</a>
    </center>
   
</html>