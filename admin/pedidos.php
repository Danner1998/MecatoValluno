<?php
session_start();
include "../php/conexion.php";
if(!isset($_SESSION['datos_login'])){
  header("Location: ../admin/");
}
$arregloUsuario = $_SESSION['datos_login'];
if($arregloUsuario['nivel']!='admin' && $arregloUsuario['nivel']!='asesor' && $arregloUsuario['nivel']!='cliente' 
&& $arregloUsuario['nivel']!='vende' && $arregloUsuario['nivel']!='gerente') {
  header("Location: ../admin/");
}
$resultado = $conexion ->query("
    select ventas.*, usuario.nombre, usuario.telefono, usuario.email from ventas
    inner join usuario on ventas.id_usuario = usuario.id
    ")or die($conexion->error);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Informe</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="icon" href="../images/logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./personas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./personas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./personas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./personas/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./personas/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./personas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./personas/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./personas/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->

<?php include "./layouts/header.php";?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="offset-xl-3 col-xl-6">
            <h1 class="m-0" style="text-align: center;">Infome de la Venta</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
      <?php
        if(isset($_GET['error'])){
       ?>
   <div class="alert alert-danger" role="alert">
   <?php echo $_GET['error'];?>
        </div>

        <?php }   ?>

        <?php
        
        if(isset($_GET['success'])){
       ?>
       
   <div class="alert alert-success" role="alert">
       Se ha insertado correctamente.
        </div>

        <?php }   ?>
        <div id="accordion">
        <div class="offset-xl-3 col-xl-6">
        <?php 
          while($f=mysqli_fetch_array($resultado)){     
        ?>
        
                <div class="card">
                    <div class="card-header" id="heading<?php echo $f['id'];?>">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $f['id'];?>" aria-expanded="true" aria-controls="collapse<?php echo $f['id'];?>">
                        <?php echo $f['fecha'].'-'.$f['nombre'];?>
                        </button>
                    </h5>
                    </div>

                    <div id="collapse<?php echo $f['id'];?>" class="collapse" aria-labelledby="heading<?php echo $f['id'];?>" data-parent="#accordion">
                    <div class="card-body">
                    
                    <p>Nombre del Cliente: <?php echo $f['nombre']; ?></p>
                    <p>Correo del Cliente: <?php echo $f['email']; ?></p>
                    <p>Telefono del Cliente: <?php echo $f['telefono']; ?></p>
                    <p>Status del Pedido: <b><?php echo $f['status']; ?></b> </p>
                    <p>Id Producto: <b><?php echo $f['id']; ?></b> </p>
                    
                    <p class="h6"><b> Datos de Envio</b></p>
                    <?php 
                      $re=$conexion->query("select * from envios where id_venta=".$f['id'])or die($conexion->error);
                      $fila=mysqli_fetch_row($re);
                   ?>
                   <p>Direccion: <?php echo $fila[3]; ?></p>
                   <p>Codigo Postal: <?php echo $fila[5]; ?></p>


                   </div> 
                   
                    </div>
                </div>
          <?php }   ?>
         </div>
         </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div> <!-- Modal Editar -->
  

  <?php include "./layouts/footer.php";?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./personas/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./personas/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="./personas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="./personas/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="./personas/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="./personas/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="./personas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="./personas/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./personas/plugins/moment/moment.min.js"></script>
<script src="./personas/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./personas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="./personas/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="./personas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./personas/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./personas/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script>
$(document).ready(function(){
  var idEliminar= -1;
  var idEditar= -1;
  var fila;
  $(".btnEliminar").click(function(){
    idEliminar= $(this).data('id');
    fila=$(this).parent('td').parent('tr');
  } );
  $(".eliminar").click(function(){
    $.ajax({
      url: '../php/eliminarproducto.php',
      method: 'POST',
      data:{
        id:idEliminar
      }
    }).done(function(res){

      $(fila).fadeOut(1000);
    });

  });
  $(".btnEditar").click(function(){
      idEditar=$(this).data('id');
      var nombre=$(this).data('nombre');
      var descripcion=$(this).data('descripcion');
      var inventario=$(this).data('inventario');
      var categoria=$(this).data('categoria');
      var precio=$(this).data('precio');
      $("#nombreEdit").val(nombre);
      $("#descripcionEdit").val(descripcion);
      $("#inventarioEdit").val(inventario);
      $("#categoriaEdit").val(categoria);
      $("#precioEdit").val(precio);
      $("#idEdit").val(idEditar);
    });

});
</script>
</body>
</html>
