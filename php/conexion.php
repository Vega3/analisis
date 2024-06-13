<?php
include_once 'config.php';

$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($conexion){
    echo 'conecto existosamente a la base de datos';
} else {
    echo 'no se conecto';
}
