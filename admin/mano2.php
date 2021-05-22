<?php
session_start();
include "../php/conexion.php";
if(!isset($_SESSION['datos_login'])){
  header("Location: ../admin/");
}
$arregloUsuario = $_SESSION['datos_login'];
if($arregloUsuario['nivel']!='admin' && $arregloUsuario['nivel']!='gerente'){
  header("Location: ../admin/");}
?>

<!DOCTYPE html><html lang="en">
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
  <link rel="stylesheet" href="estilo.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->

<?php include "./layouts/header.php";?>

<div class="content-wrapper">
<button type="button" class="btn btn-outline" data-toggle="modal" onclick="window.location='../admin/mano.php'" >
          
          <i ></i> Regresar
</button>

<section>

<div class="contendor">
        <div id="tabla">
        
            <table>
            <thead>
                <tr>
                    <th>Meses</th>
                    <th>Total de Materia Prima</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            require_once 'Clases.php';
            $producto = new Producto();
            $datos = $producto->CantidadProductosProveedores();
            for($i=0; $i<sizeof($datos); $i++)
            {
                echo  '<tr><td>'.$datos[$i]["nombre"].'</td><td>'.$datos[$i]["mes3"].'</td></tr>';
                $total = $total + $datos[$i]["mes3"];   
                                         
            }
            ?>
                <tr><td>TOTAL:</td><td><?php echo number_format($total,3,'.','');?></td></tr>
                
            </tbody>
            
        </table>
    </div>
</section>

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
      url: '../php/eliminarUsuario.php',
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
      var password=$(this).data('password');
      var nivel=$(this).data('nivel');
      $("#nombreEdit").val(nombre);
      $("#telefonoEdit").val(telefono);
      $("#correoEdit").val(email);
      $("#contraseñaEdit").val(password);
      $("#rolEdit").val(nivel);
      $("#idEdit").val(idEditar);
    });

});
</script>
</body>
</html>
