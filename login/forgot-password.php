<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Has olvidado tu contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/712575d4a5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="imagenes/logo.png">
</head>
<body>
<div class="bg-img">
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                
                <form action="forgot-password.php" method="POST" autocomplete="">
                <a for="show"  href="http://localhost/MecatoValluno/" style="text-decoration:none"class="close-btn fas fa-times" title="close"></a>
                    <h2 class="text-center">Has olvidado tu contraseña</h2>
                    <p class="text-center">Ingrese su dirección de correo electrónico</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>