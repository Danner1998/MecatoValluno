<?php
include "./conexion.php";


$conexion->query("delete from empleado where id=".$_POST['id'])or die($conexion->error);
echo 'Listo';
?>