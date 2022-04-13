<?php

header("Access-Control-Allow-Origin: http://localhost:8100");
header("Access-Control-Allow-Methods: DELETE");

$idLenguaje = 0;
 $metodo = $_SERVER["REQUEST_METHOD"];

if($metodo != "DELETE" && $metodo != "OPTIONS"){
    exit("Solo se permite el metodo DELETE");
} 
if(empty($_GET["idLen"])){
    exit("No existe id para eliminar");
}

$idLenguaje = $_GET["idLen"];
$conexion = include_once "database.php";

$consulta = $conexion ->prepare("DELETE FROM lenguajes WHERE id = ?");
$res = $consulta->execute([$idLenguaje]);
echo json_encode($res);

?>