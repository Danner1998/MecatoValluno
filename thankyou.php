<?php
session_start();
include './php/conexion.php';
if(!isset($_SESSION['carrito'])){header("Location: ./index1.php");}
$arreglo = $_SESSION['carrito'];
$total= 0;
for($i=0; $i<count($arreglo);$i++){
  $total = $total+($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}
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
    'cliente'
  
  )  
  ")or die($conexion->error);
    $id_usuario = $conexion->insert_id;
}





  $conexion->query("insert into cliente (nombre,telefono,email,nivel,pais,estado)  
  values(
    '".$_POST['c_fname']." ".$_POST['c_lname']."',
    '".$_POST['c_phone']."',
    '".$_POST['c_email_address']."',
    'cliente',
    '".$_POST['country']."',
    '".$_POST['c_state_country']."'

  
  )  
  ")or die($conexion->error);
    $id_cliente = $conexion->insert_id;



  $fecha = date('Y-m-d h:m:s');
  $conexion -> query("insert into ventas(id_usuario,total,fecha,id_cliente) values($id_usuario,$total,'$fecha', $id_cliente)")or die($conexion->error);
  $id_venta = $conexion ->insert_id;
  for($i=0; $i<count($arreglo);$i++){
    $conexion -> query("insert into productos_venta (id_venta,id_producto,cantidad,precio,subtotal)
    values(
      $id_venta,
      ".$arreglo[$i]['Id'].",
      ".$arreglo[$i]['Cantidad'].",
      ".$arreglo[$i]['Precio'].",
      ".$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']."
      )")or die($conexion->error);

      $conexion->query("update productos set inventario =inventario-".$arreglo[$i]['Cantidad']." where id=".$arreglo[$i]['Id'] )or die($conexion->error);
  }
$conexion->query(" insert into envios(pais,compania,direcion,estado,cp,id_venta) values
(
  '".$_POST['country']."',
  '".$_POST['c_companyname']."',
  '".$_POST['c_address']."',
  '".$_POST['c_state_country']."',
  '".$_POST['c_postal_zip']."',
  $id_venta
)
")or die($conexion->error);

if(isset($_POST['id_cupon'])){
    if($_POST['id_cupon']!=""){
        $conexion->query("update cupones set status ='utilizado' where id=".$_POST['id_cupon'])or die($conexion->error);
        $conexion->query("update ventas set id_cupon =".$_POST['id_cupon']." where id=".$id_venta['id_cupon'])or die($conexion->error);
    }
}
include "./php/mail.php";
  unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Compra Completada</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
   <?php include("./layouts/header.php"); ?> 


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">¡Gracias!</h2>
            <p class="lead mb-5">Su pedido se completó con éxito.</p>
            <p><a href="verpedido.php?id_venta=<?php echo $id_venta;?>" class="btn btn-sm btn-primary">Ver pedido</a></p>
            <p><a href="./index1.php" class="btn btn-sm btn-primary">Volver a la tienda</a></p>
          </div>
        </div>
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?> 

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>