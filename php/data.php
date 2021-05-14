<?php
include "conexion.php";
session_start();
if (isset($_POST['name'])) {

    if (empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['contact-email']) || empty($_POST['msg'])) {
        $error = "Todo el campo es obligatorio ";
        $_SESSION['error'] = $error;
        header("Location: ./contact.php");
    } else if (!filter_var($_POST['contact-email'], FILTER_VALIDATE_EMAIL)) {
        $error = "Ingrese su dirección de correo electrónico válida ";
        $_SESSION['error'] = $error;
        header("Location: ./contact.php");
    } else if (strlen($_POST['msg']) < 10 && strlen($_POST['msg']) > 140) {
        $error = "La longitud del mensaje debe ser superior a 10 e inferior a 140 caracteres. ";
        $_SESSION['error'] = $error;
        header("Location: ./contact.php");
    } else {

        //conectarse a la Base de Datos

        $name = $_POST['name'];
        $email = $_POST['contact-email'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];
        $is_done = $conexion->query("INSERT INTO `contacto`( `name`, `email`, `subject`, `msg` ) VALUES( '$name','$email','$subject','$msg' )");
        if ($is_done == TRUE) {
            $success = "success";
            $_SESSION['success'] = $success;
            header("Location: ../contact.php");
        }
    }
}
