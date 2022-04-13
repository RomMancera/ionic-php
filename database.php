<?php

$pass = "";
$user = "root";
$dbName= "lenguajesProg";

try {
    //code...
    return new PDO('mysql:host=localhost;dbname='.$dbName,$user,$pass);
} catch (Exeption $e) {
    //throw $th;
    echo "Ocurrio un error en la conexion con la base de datos".$e->getMessage();
}
?>