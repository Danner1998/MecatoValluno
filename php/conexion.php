<?php
$servidor="localhost";
$nombreBd="mecato";
$usuario="root";
$pass="";
$conexion= new mysqli($servidor,$usuario,$pass,$nombreBd);
if($conexion -> connect_error ){
    die("No se puede conectar");
}

?>