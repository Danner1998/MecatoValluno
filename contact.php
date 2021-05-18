<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Plantilla de contacto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

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
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Ponerse en contacto</h2>
            
          </div>
          <div class="col-md-7">

                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-primary" role="alert">
                        Gracias por contactarse con nosotros!
                        </div>
                    <?php endif; ?>


        <form role="form" class="contact-form" action="./php/data.php" method="post"> 
        <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-warning"><?php echo $_SESSION['error']; ?></div>
                 <?php endif; ?>
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_fname" class="text-black">Nombre Completo <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="name" autocomplete="off" id="name" >
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Correo Electrónico <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="contact-email" autocomplete="off" id="contact-email">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Usuario </label>
                    <input type="text" class="form-control" name="subject" autocomplete="off" id="subject" >                 
                     </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Mensaje </label>
                    <textarea class="form-control textarea" rows="3" name="msg" id="msg" ></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar mensaje">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
          <div class="block-16">
              <figure>
                <img src="images/contactanos.png" alt="Image placeholder" class="img-fluid rounded">

              </figure>      
               <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Colombia</span>
              <p class="mb-0">Cali valle del cauca, Cr29 a 54 19, numero celular 3183762680, numero telefonico 38563166</p>
            </div>

          </div>
        </div>
      </div>
    </div></div>
  <?php include("./layouts/footer.php");?> 
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