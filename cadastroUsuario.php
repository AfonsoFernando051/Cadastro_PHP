<?php


include_once('cadastrar.php');

function getDataUsuario(){
    
    $data = array();

    $data[1] = $_POST["idUsuario"];
    $data[2] = $_POST["nome"];
    $data[3] = $_POST["setor"];

    return $data;
}



if(isset($_POST['submit'])){
   
  $infoUsuario = getDataUsuario();
  $insertUsuario = "INSERT INTO usuarios1 (id_usuario, nome, id_setor) VALUES ('$infoUsuario[1]', '$infoUsuario[2]', '$infoUsuario[3]')";   
    $resultUsuario = sqlsrv_query($conn, $insertUsuario,$infoUsuario ) or die(" Falha " . $insertUsuario);

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
    
   <form name=form1 method="POST" action="cadastro.php">
    <p > Cadastro de Usuario</p>
    <table>
    <tr><td>Registro Usuario(ID):
    <td><input name="idUsuario" type=number size = 10 required></td></tr>	
	<tr><td>Nome:<td><input name="nome" type=text size = 60 required></td></tr>	
	<tr>
	<td><label>Setor</td>
	<td><input name="setor" id="setor" type="number" size ="60"></label></td></tr>
	</table>
    <br>    
    
	<input name = "submit" type = "submit" id="submit" value = "Incluir">
    </form>


<br>

<h1>Acessar páginas de cadastros: </h1>
    <a href="./home.html">Home</a>
	<a href="./cadastroUsuario.php">Cadastro de usuário;</a>
	<a href="./cadastroAtendente.php">Cadastro de Atendente;</a>
	<a href="./cadastroSetor.php">Cadastro de Setor;</a>
   
</html>