<?php

header("Access-Control-Allow-Origin: http://localhost:8100");
header("Access-Control-Allow-Headers: *");

$jsonLenguaje = json_decode(file_get_contents("php://input"));

if(!$jsonLenguaje){
    exit("No existen datos");
}

$conexion = include_once "database.php";
$consulta = $conexion->prepare("INSERT INTO lenguajes(nombre, tipo, creador, caracteristicas) VALUES (?, ?, ?,?)");
$res = $consulta->execute([
    $jsonLenguaje->nombre,
    $jsonLenguaje->tipo,
    $jsonLenguaje->creador,
    $jsonLenguaje->caracteristicas,
]);
echo json_encode([
    "Lenguaje nuevo" => $res,
]);

?>