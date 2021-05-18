<?php
include "./conexion.php";

$conexion->query("delete from provedores where id=".$_POST['id'])or die($conexion->error);
echo 'Listo';

?>