<?php
include "./conexion.php";

$password="";
if(isset($_POST['c_account_password'])){
  if($_POST['c_account_password']!=""){
    $password = $_POST['c_account_password'];

  }
}
$encpass = password_hash($password, PASSWORD_BCRYPT);
$conexion->query("insert into usuario (nombre,telefono,email,password,img_perfil,nivel)  
values(
  '".$_POST['c_fname']." ".$_POST['c_lname']."',
  '".$_POST['c_phone']."',
  '".$_POST['c_email_address']."',
  '".sha1($password)."',
  'defaul.jpg',
  'cliente'

)  
")or die($conexion->error);
  $id_usuario = $conexion->insert_id;
  header("Location: ../admin/usuarios.php?success");

  $conexion->query("insert into cliente (nombre,telefono,email,nivel,estado)  
  values(
    '".$_POST['c_fname']." ".$_POST['c_lname']."',
    '".$_POST['c_phone']."',
    '".$_POST['c_email_address']."',
    'cliente',
    'activo'

  
  )  
  ")or die($conexion->error);
    $id_cliente = $conexion->insert_id;



?>