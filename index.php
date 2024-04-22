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
        insertarMensajes($conexion);
        break;
    // insertar valores de admin
    case 'POST_ADMIN':
        insertarValoresAdmin($conexion);
        break;
    // update mensajes
    case 'PUT':
        actualizar($conexion, $id);
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
function consultaSelect($conexion){
    $id_unico = $_GET['id_unico']; // Obtener el valor del parámetro id_unico de la URL
    $sql = "SELECT * FROM datos_chat WHERE id_unico = '$id_unico' ORDER BY fecha ASC";
    $resultado = $conexion->query($sql);
    if($resultado){
        $datos = array();
        while($fila = $resultado->fetch_assoc()){
            $datos[] = $fila;
        }
        echo json_encode($datos);
    }
}
// función para insertar mensajes
function insertarMensajes($conexion){
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

// función para insertar valores de admin
function insertarValoresAdmin($conexion) {
    $dato = json_decode(file_get_contents('php://input'), true);
    $respuestas=$dato['respuestas'];
    date_default_timezone_set('America/Mexico_City');
    $fecha=date('Y-m-d H:i:s');
    $nombre=$dato['nombre'];
    $correo=$dato['correo'];
    $telefono=$dato['telefono'];
    $id_unico_respuesta=$dato['id_unico_respuesta'];
    
    $sql="INSERT INTO datos_chat(respuestas, nombre, correo, telefono, fecha_cierre, id_unico_respuesta) 
    VALUES ('$respuestas', '$nombre', '$correo', '$telefono','$fecha', '$id_unico_respuesta')";
    
    $resultado = $conexion->query($sql);
    
    if ($resultado) {
        $dato['id'] = $conexion->insert_id;
        echo json_encode($dato);
    } else {
        echo json_encode(array('error' => 'Error al insertar valores'));
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
function actualizar($conexion, $id){
    $dato=json_decode(file_get_contents('php://input'),true);
    $preguntas=$dato['preguntas'];
    date_default_timezone_set('America/Mexico_City');
    $fecha=date('Y-m-d H:i:s');
    $nombre=$dato['nombre'];
    $correo=$dato['correo'];
    $telefono=$dato['telefono'];
    $id_unico=$dato['id_unico'];
    $sql="UPDATE datos_chat SET preguntas = '$preguntas', fecha = '$fecha', nombre = '$nombre', correo = '$correo', telefono = '$telefono', id_unico = '$id_unico' WHERE id = $id";
    $resultado= $conexion->query($sql);
    if($resultado){
        echo json_encode(array('success'=>'Datos actualizados correctamente'));
    }else{
        echo json_encode(array('error'=>'Error al actualizar los datos'));
    }
}
?>