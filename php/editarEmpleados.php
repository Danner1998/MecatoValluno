<?php 
include "./conexion.php";
if(isset($_POST['estado']) &&  isset($_POST['nota'])){
    

    
  //llave si no esta vacio

    $conexion->query("update empleado set 
                        estado='".$_POST['estado']."',
                        nota='".$_POST['nota']."'
                        where id=".$_POST['id']);
                        header("Location: ../admin/empleados.php");


                          //llave si no esta vacio


                        
}   


               

?>