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

//consegimos el $id
$path= isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';

$buscarId = explode('/',$path);

$id = ($path!=='/') ? end($buscarId):null;

switch ($metodo) {
    // Select mensajes
    case 'GET':
        consultaSelect($conexion);
        break;
    // insertar mensajes
    case 'POST':
        insertar($conexion);
        break;
    // update mensajes
    case 'PUT':
        
        break;
    // delate mensajes
    case 'DELETE':
        delate($conexion, $id);
        break;
    default:
        echo "Metodo no permitido";
        break;
}
//funcion para consultar la informacion de la base de datos 
Function consultaSelect($conexion){
$sql="SELECT * FROM datos_chat ORDER BY fecha ASC";
$resultado= $conexion->query($sql);
    if($resultado){
        $datos=array();
        while($fila=$resultado->fetch_assoc()){
            $datos[]=$fila;
        }
        echo json_encode($datos);
    }
}

//funcion de insertar informacion
function insertar($conexion){
    $dato=json_decode(file_get_contents('php://input'),true);
    $preguntas=$dato['preguntas'];
    date_default_timezone_set('America/Mexico_City');
    $fecha=date('Y-m-d H:i:s');
    $nombre=$dato['nombre'];
    $correo=$dato['correo'];
    $telefono=$dato['telefono'];
    $id_unico=$dato['id_unico'];
    
    $sql="INSERT INTO datos_chat(preguntas, fecha, nombre, correo, telefono, id_unico) 
    VALUES ('$preguntas', '$fecha', '$nombre', '$correo', '$telefono', '$id_unico')";
    
    $resultado= $conexion->query($sql);
    
    if($resultado){
        $dato['id']=$conexion->insert_id;
        echo json_encode($dato);
    }else{
        echo json_encode(array('error'=>'error al crear usuario'));
    }
}

//funcion de delate
function delate($conexion, $id){
    echo "El id a borrar es:". $id;

    $sql=" DELETE FROM datos_chat WHERE id = $id";
    $resultado= $conexion->query($sql);
    
    if($resultado){
        echo json_encode(array('mensaje'=>'Mensaje Eliminado'));
    }else{
        echo json_encode(array('error'=>'error al Eliminar mensaje'));
    }

}


?>