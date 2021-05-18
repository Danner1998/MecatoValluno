<?php
session_start();
include "../php/conexion.php";
if(!isset($_SESSION['datos_login'])){
  header("Location: ../admin/");
}
$arregloUsuario = $_SESSION['datos_login'];
if($arregloUsuario['nivel']!='admin'){
  header("Location: ../admin/");
}
$resultado = $conexion ->query("select * from empleado where id order by id DESC")or die($conexion->error);
$resultado2 = $conexion ->query("select * from cliente where id order by id DESC")or die($conexion->error);



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Permisos</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./personas/plugins/fontawesome-free/css/all.min.css">
  <link rel="icon" href="../images/logo.png">
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
            <h1 class="m-0" style="text-align: center">Solicitud de Permisos</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
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
      <table class="table">
      <thead>
      <tr>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Roles</th>
      <th>Estado</th>
      <th>Descripcion</th>

      </tr>
      </thead>

      <tbody>
      <tr>
      <?php
        while($f = mysqli_fetch_array($resultado)){
         
      ?>

      <td>
      <?php echo $f['nombre'];?></td>
      <td><?php echo $f['email'];?></td>
      <td><?php echo $f['nivel'];?> </td>
      <td><?php echo $f['estado'];?> </td>
      <td><?php echo $f['nota'];?> </td>
      <td>

      <button class="btn btn-outline-warning btn-small btnEditar"  
                          data-id="<?php echo $f['id']; ?>"
                          data-estado="<?php echo $f['estado']; ?>"
                          data-informe="<?php echo $f['informe']; ?>"
                          data-toggle="modal" data-target="#modalEditar">
                          <i class="fa fa-edit"></i>
                        </button>




      </td>
      </tr>
      <?php
               }
          ?>


<?php
        while($f2 = mysqli_fetch_array($resultado2)){
         
      ?>

      <td>
      <?php echo $f2['nombre'];?></td>
      <td><?php echo $f2['email'];?></td>
      <td><?php echo $f2['nivel'];?> </td>
      <td><?php echo $f2['estado'];?> </td>
      <td><?php echo $f2['nota'];?> </td>
      <td>

      <button class="btn btn-outline-warning btn-small btnEditar1"  
                          data-id="<?php echo $f2['id']; ?>"
                          data-estado="<?php echo $f2['estado']; ?>"
                          data-informe="<?php echo $f2['informe']; ?>"
                          data-toggle="modal" data-target="#modalEditar1">
                          <i class="fa fa-edit"></i>
                        </button>




      </td>
      </tr>
      <?php
               }
          ?>
      </tbody>
      </table>
    
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>




<!-- eliminar --->



   <!-- Modal Editar -->
   <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="../php/editarSolicitud.php" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditar">Cambios Realizados</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <input type="hidden" id="idEdit" name="id">
             


              <div class="form-group">
                  <label for="estadoEdit">Cambio de Estado</label>
                  
                  <input type="text"  name="estado" placeholder="Estado del Empleado" id="estadoEdit" class="form-control" required>
                   
              </div>
              <div class="form-group">
                  <label for="informeEdit">Escribir Especificaciones</label>
                  
                  <input type="text"  name="informe" placeholder="Estado del Empleado" id="informeEdit" class="form-control" required>
                   
              </div>

              


          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-outline-success editar">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div> 

  <div class="modal fade" id="modalEditar1" tabindex="-1" role="dialog" aria-labelledby="modalEditar1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="../php/editarSolicitud1.php" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditar1">Cambios Realizados</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <input type="hidden" id="idEdit1" name="id">
             


              <div class="form-group">
                  <label for="estadoEdit1">Cambio de Estado</label>
                  
                  <input type="text"  name="estado" placeholder="Estado del Cliente" id="estadoEdit1" class="form-control" required>
                   
              </div>
              <div class="form-group">
                  <label for="informeEdit1">Escribir Especificaciones</label>
                  
                  <input type="text"  name="informe" placeholder="Estado del Cliente" id="informeEdit1" class="form-control" required>
                   
              </div>

              


          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-outline-success editar">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div> 


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
      url: '../php/eliminarEmpleado.php',
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
      var estado=$(this).data('estado');
      var informe=$(this).data('informe');
      $("#estadoEdit").val(estado);
      $("#informeEdit").val(informe);
      $("#idEdit").val(idEditar);
    });

    $(".btnEditar1").click(function(){
      idEditar1=$(this).data('id');
      var estado=$(this).data('estado');
      var informe=$(this).data('informe');
      $("#estadoEdit1").val(estado);
      $("#informeEdit1").val(informe);
      $("#idEdit1").val(idEditar1);
    });

});
</script>
</body>
</html>
