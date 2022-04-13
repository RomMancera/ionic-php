<?php

   header("Access-Control-Allow-Origin: http://localhost:8100");

   $conexion = include_once "database.php";

   $consulta = $conexion->query("SELECT * FROM lenguajes");

   $lenguajes = $consulta->fetchAll(PDO::FETCH_OBJ);
   
   echo json_encode($lenguajes);

?>