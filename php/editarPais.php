<?php 
include "./conexion.php";
if(isset($_POST['pais']) &&  isset($_POST['estado'])   &&  isset($_POST['cp'])
    &&  isset($_POST['compania']) &&  isset($_POST['direcion'])){
    

    
  //llave si no esta vacio
    $conexion->query("update envios set 
    pais='".$_POST['pais']."',
    estado='".$_POST['estado']."',
    cp='".$_POST['cp']."',
    compania='".$_POST['compania']."',
    direcion='".$_POST['direcion']."'
    where id_envio=".$_POST['id_envio'])or die($conexion->error);
   header("Location: ../admin/paises.php");
}   
?>