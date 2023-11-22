<?php
$host="localhost";
$usuario="root";
$password="1234";
$basededatos="chat";

$conexion= new mysqli($host,$usuario,$password,$basededatos);
if ($conexion->connect_error) {
    die ("conexion no establecida". $conexion->connect_error);
}
// Devolver el formato en app json
header("content-type: application/json");

$metodo = $_SERVER['REQUEST_METHOD'];

print_r($metodo);


switch ($metodo) {
    // Select mensajes
    case 'GET':
        echo "Consultar registros - GET";
        break;
    // insertar mensajes
    case 'POST':
        echo "Consultar registros - POST";
        break;
    // update mensajes
    case 'PUT':
        echo "Consultar registros - PUT";
        break;
    // delate mensajes
    case 'DELETE':
        echo "Consultar registros - DELETE";
        break;
    default:
        echo "Metodo no permitido";
        break;
}
?>