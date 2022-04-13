<?php

header("Access-Control-Allow-Origin: http://localhost:8100");

$idLenguaje = 0;

if(empty($_GET["idLen"])){
    exit("No hay id de ese lenguaje");
}

$idLenguaje = $_GET["idLen"];
$conexion = include_once "database.php";
$consulta = $conexion->prepare("SELECT * FROM lenguajes WHERE id = ?");
$consulta->execute([$idLenguaje]);
$Lenguaje = $consulta->fetchObject();
echo json_encode($Lenguaje);



?>