<?php
include "./conexion.php";


$conexion->query("insert into calculo (nombre,telefono,email,pais,estado)  
values(
  '".$_POST['nombre'].",
  '".$_POST['mes1']."',
  '".$_POST['mes2']."',
  '".$_POST['mes3']."',

)  
")or die($conexion->error);

  header("Location: ../admin/provedores.php?success");


?>