<?php
include "./conexion.php";

$conexion->query("delete from usuario where id=".$_POST['id'])or die($conexion->error);
echo 'Listo';

?>