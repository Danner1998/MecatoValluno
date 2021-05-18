<?php 
include "./conexion.php";
if(isset($_POST['estado']) &&  isset($_POST['informe'])){
    

    
  //llave si no esta vacio

    $conexion->query("update empleado set 
                        estado='".$_POST['estado']."',
                        informe='".$_POST['informe']."'
                        where id=".$_POST['id']);
                        header("Location: ../admin/solicitud.php");


                          //llave si no esta vacio


                        
}   


               

?>