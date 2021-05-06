<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/712575d4a5.js" crossorigin="anonymous"></script>
    <link rel="icon" href="imagenes/logo.png">

</head>
<body>

<div class="bg-img">
</div>

 
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-4 offset-md-4 form login-form">
    
                <form action="login-user.php" method="POST" autocomplete="">
                <a for="show"  href="http://localhost/MecatoValluno/" style="text-decoration:none"class="close-btn fas fa-times" title="close"></a>
                    <h2 class="text-center">Inicia sesión</h2>
                    <p class="text-center">Inicie sesión con su correo electrónico y contraseña.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div   class="link forget-pass text-left"  ><a class="centrdo" href="forgot-password.php" >¿Se te olvidó tu contraseña? </a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">¿Todavía no eres miembro? <a href="signup-user.php">Regístrese ahora</a></div>
                </form>
            </div>
        </div>
    </div>

            
</body>
</html>


