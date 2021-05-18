<?php 
include "./conexion.php";
if(isset($_POST['nombre']) &&  isset($_POST['telefono'])   &&  isset($_POST['email'])
    &&  isset($_POST['password']) &&  isset($_POST['nivel'])){
    

    
  //llave si no esta vacio
  $encpass = password_hash($password, PASSWORD_BCRYPT);
    $conexion->query("update usuario set 
                        nombre='".$_POST['nombre']."',
                        telefono='".$_POST['telefono']."',
                        email='".$_POST['email']."',
                        password='".sha1($password)."',
                        nivel='".$_POST['nivel']."'
                        where id=".$_POST['id']);
                        header("Location: ../admin/usuarios.php");


                          //llave si no esta vacio


                        
}   


               

?>