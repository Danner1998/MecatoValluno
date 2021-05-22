<?php
session_start();
include "../php/conexion.php";
if(!isset($_SESSION['datos_login'])){
  header("Location: ../admin/");
}
$arregloUsuario = $_SESSION['datos_login'];
if($arregloUsuario['nivel']!='admin' && $arregloUsuario['nivel']!='director'){
  header("Location: ../admin/");
}
$resultado = $conexion ->query("select * from provedores where id order by id DESC")or die($conexion->error);



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proveedores</title>
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
  
  <link rel="stylesheet" href="estilo.css">
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
            <h1 class="m-0" style="text-align: center">Gestion de Proveedores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModalCenter">
          
          <i class="nav-icon fas fa-user"></i> Insertar Proveedor
</button>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div  id="tabla" >
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
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th>Pais</th>
      <th>Ciudad</th>
      <th>Edicion</th>

      </tr>
      </thead>

      <tbody>
      <tr>
      <?php
        while($f = mysqli_fetch_array($resultado)){
         
      ?>

      <td><?php echo $f['id'];?></td>
      <td>
      <?php echo $f['nombre'];?></td>
      <td><?php echo $f['telefono'];?></td>
      <td><?php echo $f['email'];?></td>
      <td><?php echo $f['pais'];?></td>
      <td><?php echo $f['estado'];?> </td>
      <td>

      <button class="btn btn-outline-warning btn-small btnEditar"  
                          data-id="<?php echo $f['id']; ?>"
                          data-nombre="<?php echo $f['nombre']; ?>"
                          data-telefono="<?php echo $f['telefono']; ?>"
                          data-email="<?php echo $f['email']; ?>"
                          data-pais="<?php echo $f['pais']; ?>"
                          data-estado="<?php echo $f['estado']; ?>"
                          data-toggle="modal" data-target="#modalEditar">
                          <i class="fa fa-edit"></i>
                        </button>



      <button class="btn btn-outline-danger btn-small btnEliminar"
      data-id="<?php echo $f['id'];?>"
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

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="../php/insertarProveedores.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insertar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <div class="form-group">

        <label for="c_fname">Nombres</label>
        <input type="text" name="c_fname" placeholder="Ingresar Nombres" id="c_fname" class="form-control"required>

      </div>


        <div class="form-group">

        <label for="c_phone">Telefono</label>
        <input type="text" name="c_phone" placeholder="Ingresar Telefono" id="c_phone" class="form-control"required>

          </div>

          <div class="form-group">

        <label for="c_email_address">Correo</label>
        <input type="text" name="c_email_address" placeholder="Ingresar Correo" id="c_email_address" class="form-control"required>

          </div>


          <div class="form-group">

        <label for="c_account_pais">Pais</label>
        <input type="text" name="c_account_pais" placeholder="Ingresar pais" id="c_account_pais" class="form-control"required>

            </div>


            <div class="form-group">

<label for="c_account_ciu">Ciudad</label>
<input type="text" name="c_account_ciu" placeholder="Ingresar pais" id="c_account_ciu" class="form-control"required>

    </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-outline-success">Guardar</button>
        
      </div>
      </form>
    </div>
  </div>
</div>

<!-- insertar 2 --->


<!-- eliminar --->

<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
 
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminar">Eliminar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ¿Desea Eliminar el Proveedor?
   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-outline-danger eliminar" data-dismiss="modal">Eliminar</button>
        
      </div>

    </div>
  </div>
</div>


   <!-- Modal Editar -->
   <!-- Modal Editar -->
   <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="../php/editarProveedor.php" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditar">Editar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <input type="hidden" id="idEdit" name="id">
             
              <div class="form-group">
                  <label for="nombreEdit">Nombre</label>
                  <input type="text" name="nombre" placeholder="Nombre Completo" id="nombreEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="telefonoEdit">Telefono</label>
                  <input type="text" name="telefono" placeholder="Numero Telefono" id="telefonoEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="correoEdit">Correo</label>
                  <input type="text" name="email" placeholder="Correo Eletronico" id="correoEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="contraseñaEdit">pais</label>
                  <input type="text"  name="pais" placeholder="Contraseña" id="contraseñaEdit" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="rolEdit">Roles</label>
                  <input type="text"  name="estado" placeholder="Rol Usuario" id="rolEdit" class="form-control" required>
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
      url: '../php/eliminarProveedor.php',
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
      var telefono=$(this).data('telefono'); 
      var email=$(this).data('email');
      var pais=$(this).data('pais');
      var estado=$(this).data('estado');
      $("#nombreEdit").val(nombre);
      $("#telefonoEdit").val(telefono);
      $("#correoEdit").val(email);
      $("#contraseñaEdit").val(pais);
      $("#rolEdit").val(estado);
      $("#idEdit").val(idEditar);
    });

});
</script>
</body>
</html>
