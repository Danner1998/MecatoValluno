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

    $resultado = $conexion ->query("select * from envios where id_envio order by id_envio DESC")or die($conexion->error);


?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Productos</title>
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
            <h1 class="m-0"style="text-align: center">Gestion de Pedidos</h1>
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
      <th>Id</th>
      <th>Pais</th>
      <th>Ciudad</th>
      <th>Estado</th>
      <th>Compañia</th>
      <th>Direccion</th>



      </tr>
      </thead>

      <tbody>
      <tr>
      <?php
        while($f = mysqli_fetch_array($resultado)){
         
      ?>

      <td><?php echo $f['id_envio'];?></td>
      <td>
      <?php echo $f['pais'];?></td>
      <td><?php echo $f['estado'];?></td>
      <td><?php echo $f['cp'];?></td>
      <td><?php echo $f['compania'];?></td>
      <td><?php echo $f['direcion'];?> </td>

      <td>

      <button class="btn btn-outline-warning btn-small btnEditar"  
                          data-id_envio="<?php echo $f['id_envio']; ?>"
                          data-pais="<?php echo $f['pais']; ?>"
                          data-estado="<?php echo $f['estado']; ?>"
                          data-cp="<?php echo $f['cp']; ?>"
                          data-compania="<?php echo $f['compania']; ?>"
                          data-direcion="<?php echo $f['direcion']; ?>"
                          data-toggle="modal" data-target="#modalEditar">
                          <i class="fa fa-edit"></i>
                        </button>


      <button class="btn btn-outline-danger btn-small btnEliminar"
      data-id_envio="<?php echo $f['id_envio'];?>"
       data-toggle="modal" data-target="#modalEliminar">
       <i class="fa fa-trash"></i>
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

<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
 
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminar">Eliminar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ¿Desea Eliminar Registro?
   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-outline-danger eliminar" data-dismiss="modal">Eliminar</button>
      </div>

    </div>
  </div>
</div>


   <!-- Modal Editar -->
   <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="../php/editarPais.php" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditar">Editar Registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <input type="hidden" id="idEdit" name="id_envio">
             
              <div class="form-group">
                  <label for="nombreEdit">Pais</label>
                  <input type="text" name="pais" placeholder="Nombre Completo" id="nombreEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="telefonoEdit">Ciudad</label>
                  <input type="text" name="estado" placeholder="Numero Telefono" id="telefonoEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="correoEdit">Codigo Postal</label>
                  <input type="text" name="cp" placeholder="Correo Eletronico" id="correoEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="contraseñaEdit">Compañia</label>
                  <input type="text"  name="compania" placeholder="Contraseña" id="contraseñaEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="rolEdit">Direccion</label>
                  <input type="text"  name="direcion" placeholder="Rol Usuario" id="rolEdit" class="form-control" required>
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
    idEliminar= $(this).data('id_envio');
    fila=$(this).parent('td').parent('tr');
  } );
  $(".eliminar").click(function(){
    $.ajax({
      url: '../php/eliminarPaises.php',
      method: 'POST',
      data:{
        id_envio:idEliminar
      }
    }).done(function(res){

      $(fila).fadeOut(1000);
    });

  });
  $(".btnEditar").click(function(){
    id_envio=$(this).data('id_envio');
      var pais=$(this).data('pais');
      var estado=$(this).data('estado'); 
      var cp=$(this).data('cp');
      var compania=$(this).data('compania');
      var direcion=$(this).data('direcion');
      $("#nombreEdit").val(pais);
      $("#telefonoEdit").val(estado);
      $("#correoEdit").val(cp);
      $("#contraseñaEdit").val(compania);
      $("#rolEdit").val(direcion);
      $("#idEdit").val(id_envio);

      
    });

});
</script>
</body>
</html>
