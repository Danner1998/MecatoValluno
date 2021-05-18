<?php
include "./conexion.php";

$conexion->query("delete from cliente where id=".$_POST['id'])or die($conexion->error);
echo 'Listo';

?>