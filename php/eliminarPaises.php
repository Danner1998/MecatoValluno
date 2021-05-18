<?php
include "./conexion.php";

$conexion->query("delete from envios where id_envio=".$_POST['id_envio'])or die($conexion->error);
echo 'Listo';

?>