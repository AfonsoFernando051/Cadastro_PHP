<?php


include_once('cadastrar.php');

function getDataAtendente(){
    
    $data = array();

    $data[1] = $_POST["id_atendente"];
    $data[2] = $_POST["nome_atendente"];

    return $data;
}

if(isset($_POST['submit'])){
  
      $infoAtendente = getDataAtendente();
      $insertAtendente = "INSERT INTO atendente (id_atendente, nome_atendente) VALUES ('$infoAtendente[1]', '$infoAtendente[2]')";   
      $resultAtendente = sqlsrv_query($conn, $insertAtendente,$infoAtendente ) or die(" Falha " . $insertAtendente);
      
      echo $resultAtendente;


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
<form  name=form3 method="POST" action="cadastroAtendente.php">
    <p > Cadastro de Atendentes</p>
    <table>
    <tr><td>Registro de Atendentes(ID):<td><input name="id_atendente" type=number size = 5 required></td></tr>	
	<tr><td>Atendente:<td><input name="nome_atendente" type=text size = 60 required></td></tr>	
	<tr>
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