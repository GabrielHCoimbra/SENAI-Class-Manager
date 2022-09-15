<?php

$hostname = "localhost";
$user = "root";
$passwd = "";
$database = "alunos";

$mysqli = new myslqi($hostname,$user,$passwd,$database);
if($mysqli -> connect_errno){
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>