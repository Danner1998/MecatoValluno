<?php
include "./conexion.php";

  $password="";
if(isset($_POST['c_account_password'])){
  if($_POST['c_account_password']!=""){
    $password = $_POST['c_account_password'];

  }
}

$encpass = password_hash($password, PASSWORD_BCRYPT);
$re = $conexion->query("select id,email from usuario where email = '".$_POST['c_email_address']."'")or die ($conexion->error);
$id_usuario = 0;
if(mysqli_num_rows($re)>0){
 $fila= mysqli_fetch_row($re);
 $id_usuario=$fila[0];
}else{
  $conexion->query("insert into usuario (nombre,telefono,email,password,img_perfil,nivel)  
  values(
    '".$_POST['c_fname']." ".$_POST['c_lname']."',
    '".$_POST['c_phone']."',
    '".$_POST['c_email_address']."',
    '".sha1($password)."',
    'defaul.jpg',
    '".$_POST['niveles']."'
  
  )  
  ")or die($conexion->error);
    $id_usuario = $conexion->insert_id;
    header("Location: ../admin/usuarios.php?success");
}




?>