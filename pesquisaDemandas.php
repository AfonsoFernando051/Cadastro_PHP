

<?php


include_once('cadastrar.php');

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
    <form  name=form3 method="POST" action="pesquisaDemandas.php">
    <p > Pesquisa de Demandas</p>
     <table>
	</table>
    <input name = "search" type = "submit" id="search" value = "Pesquisar">

    </form>

<br>
<h1>Acessar páginas de cadastros: </h1>
    <a href="./home.html">Home</a>
	<a href="./cadastroUsuario.php">Cadastro de usuário;</a>
	<a href="./cadastroAtendente.php">Cadastro de Atendente;</a>
	<a href="./cadastroSetor.php">Cadastro de Setor;</a>
   
</html>