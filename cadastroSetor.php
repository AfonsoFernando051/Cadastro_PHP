<?php


include_once('cadastrar.php');

 
function getDataSetor(){
    
    $data = array();

    $data[1] = $_POST["idSetor"];
    $data[2] = $_POST["nome_setor"];

    return $data;
}


if(isset($_POST['submit'])){ 
  
    $infoSetor = getDataSetor();
    $insertSetor = "INSERT INTO setor (idSetor, nome_setor) VALUES ('$infoSetor[1]', '$infoSetor[2]')";   
    $resultSetor = sqlsrv_query($conn, $insertSetor,$infoSetor ) or die(" Falha " . $insertSetor);

        echo $resultSetor;
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


    <form  name=form2 method="POST" action="cadastroSetor.php">
    <p > Cadastro de Setores</p>
     <table>
    <tr><td>Registro de Setor(ID):<td><input name='idSetor' type=number size = 3 required></td></tr>	
	<tr><td>Setor:<td><input name="nome_setor" type=text size = 60 required></td></tr>	
	<tr>
	</table>
    <input name = "submit" type = "submit" id="submit" value = "Incluir">
    </form>

<br>
<h1>Acessar páginas de cadastros: </h1>
    <a href="./home.html">Home</a>
	<a href="./cadastroUsuario.php">Cadastro de usuário;</a>
	<a href="./cadastroAtendente.php">Cadastro de Atendente;</a>
	<a href="./cadastroSetor.php">Cadastro de Setor;</a>
   
</html>