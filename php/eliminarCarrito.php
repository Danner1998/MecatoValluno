<?php
session_start();
$arreglo = $_SESSION['carrito'];
for($i=0;$i<count($arreglo);$i++){
    if($arreglo[$i]['Id'] != $_POST['id']){
        $arregloUno[]= array(

            'Id'=>$arreglo[$i]['Id'],
            'Nombre'=>$arreglo[$i]['Nombre'],
            'Precio'=>$arreglo[$i]['Precio'],
            'Imagen'=>$arreglo[$i]['Imagen'],
            'Cantidad'=>$arreglo[$i]['Cantidad']
        );
    }
}
  if(isset($arregloUno)){
      $_SESSION['carrito']=$arregloUno;
  }else{
      unset($_SESSION['carrito']);
  }
echo "Lito";
?>