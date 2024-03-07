<?php 

$hostname = "localhost";
$database = "cadastro";
$user = "root";
$password = "";

$mysqli = new mysqli($hostname, $user, $password, $database);
if ($mysqli->connect_errno){
    echo "Erro:  (" . $mysqli->connect_errno.")" . $mysqli->connect_error;
}else {
    //echo "Conexão realizada com sucesso";
};