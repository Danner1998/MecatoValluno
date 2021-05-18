<?php 
include "./conexion.php";
if(isset($_POST['nombre']) &&  isset($_POST['telefono'])   &&  isset($_POST['email'])
    &&  isset($_POST['pais']) &&  isset($_POST['estado'])){
    

    
  //llave si no esta vacio

    $conexion->query("update provedores set 
                        nombre='".$_POST['nombre']."',
                        telefono='".$_POST['telefono']."',
                        email='".$_POST['email']."',
                        pais='".$_POST['pais']."',
                        estado='".$_POST['estado']."'
                        where id=".$_POST['id']);
                        header("Location: ../admin/provedores.php");


                          //llave si no esta vacio


                        
}   


               

?>