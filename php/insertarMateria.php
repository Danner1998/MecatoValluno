<?php
include "./conexion.php";


$conexion->query("insert into totales (nombre,mes1,mes2)  
values(
  '".$_POST['mes12']."',
  '".$_POST['mes22']."',
  '".$_POST['mes32']."'

)  
")or die($conexion->error);

header("Location: ../admin/mano.php?success");


?>