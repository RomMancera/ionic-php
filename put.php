<?php
header("Access-Control-Allow-Origin: http://localhost:8100");
header("Access-Control-Allow-Methods: PUT");
header('Access-Control-Allow-Headers: *');
$metodo = $_SERVER["REQUEST_METHOD"];
$idLenguaje = 0;

if($metodo != "PUT"){
exit("Solo se permite el metodo PUT");
}
$jsonLenguaje = json_decode(file_get_contents("php://input"));

if(empty($_GET["idLen"])){
exit("No existe id para actualizar");
}

$idLenguaje = $_GET["idLen"];
if(!$jsonLenguaje){
exit ( "No hay datos");
}

$bd = include_once "database.php";
$consulta = $bd->prepare("UPDATE lenguajes SET nombre = ?, tipo = ?, creador = ?, caracteristicas =? WHERE id = ? ");
$res = $consulta->execute([
$jsonLenguaje->nombre,
$jsonLenguaje->tipo,
$jsonLenguaje->creador,
$jsonLenguaje->caracteristicas,
$idLenguaje
]);
echo json_encode($res);

?>