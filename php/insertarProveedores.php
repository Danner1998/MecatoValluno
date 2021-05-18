<?php
include "./conexion.php";


$conexion->query("insert into provedores (nombre,telefono,email,pais,estado)  
values(
  '".$_POST['c_fname']." ".$_POST['c_lname']."',
  '".$_POST['c_phone']."',
  '".$_POST['c_email_address']."',
  '".$_POST['c_account_pais']."',
  '".$_POST['c_account_ciu']."'

)  
")or die($conexion->error);

  header("Location: ../admin/provedores.php?success");


?>