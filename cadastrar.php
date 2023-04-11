<?php

$dbhost   = " ";
$db       = "cadastroPessoa";
$user     = "sa";
$password = "";

$connectionInfo = array("Database"=>$db,"UID"=>$user, "PWD"=>$password);
$conn = sqlsrv_connect($dbhost, $connectionInfo);


if( $conn === false ) {
    echo "Could not connect.\n <pre>";
    $message = "Erro ao conectar com sql server";
    if(isset(sqlsrv_errors()[0])){
        $message = sqlsrv_errors()[0];
    }
    die(print_r($message, true));
} 
else{
    echo "Conectado";
}



?>