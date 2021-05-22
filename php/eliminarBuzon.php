<?php
include "./conexion.php";

$conexion->query("delete from contacto where id=".$_POST['id'])or die($conexion->error);
echo 'Listo';

?>