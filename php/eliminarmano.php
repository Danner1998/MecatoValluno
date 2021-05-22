<?php
include "./conexion.php";

$conexion->query("delete from totales where id=".$_POST['id'])or die($conexion->error);
echo 'Listo';

?>