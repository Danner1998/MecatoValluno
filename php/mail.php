
<?php
/*session_start();*/
function limpiarAsunto($asunto)
{
    $cadena = "Subject";
    $longitud = strlen($cadena) + 2;
    return substr(
        iconv_mime_encode(
            $cadena,
            $asunto,
            [
                "input-charset" => "UTF-8",
                "output-charset" => "UTF-8",
            ]
        ),
        $longitud
    );
}

$asunto = limpiarAsunto("Gracias por tu compra ");
$destinatario = $_POST['c_email_address'];

$encabezados = "MIME-Version: 1.0" . "\r\n";

# ojo, es una concatenación:
$encabezados .= "Content-type:text/html; charset=UTF-8" . "\r\n";
$encabezados .= 'From: Mecato Vallunos <contacto@parzibyte.me>' . "\r\n";

$mensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Este es un mensaje</title>
    <style type="text/css">
        h1{
            color: #8bc34a;
        }
        p{
            font-size: 1rem;
        }
        img{
            width: 10rem;
            height: 10rem;
        }
    </style>
</head>
<body>
<h1>Gracias por tu compra '.$_POST['c_fname']." ".$_POST['c_lname'].'</h1>
<p>Es un honor que hayas comprado en nuestra tienda.</p>
<p>
Recuerda que puedes seguir comprando en tu tienda favorita <a href="http://localhost/MecatoValluno/">MecatoValluno.com</a>. los esperamos 
con un gran abrazo, porque ustedes son nuestros clientes favoritos. 
</p>

<h3>Detalles de la compra</h3>
<table>
    <thead>
    
        <tr>
        <th scope="col">Nombre producto&nbsp;&nbsp;</th>
        <th scope="col">Precio Iniciañ&nbsp;</th>
        <th scope="col">Unidades&nbsp;</th>
        <th scope="col">Subtotal&nbsp;</th>
        </tr>

    </thead>
    <tbody>';
        $total =0;
        if(isset($_SESSION['carrito'])){
        $arregloCarrito =$_SESSION['carrito'];
        for($i=0;$i<count($arregloCarrito);$i++){
          $total= $total + ( $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']);
          $mensaje.='<tr><td>'. $arregloCarrito[$i]['Nombre'].'</td>';
          $mensaje.='<td>'. number_format($arregloCarrito[$i]['Precio'],3,'.','');'</td>';
          $mensaje.='<td>'. $arregloCarrito[$i]['Cantidad'].'</td>';
          $mensaje.='<td>'. number_format($arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad'],3,'.','').'</td> </tr>';
        }    } 
$mensaje.='</tbody></table>';
$mensaje.='<h2>Total de la compra: '.$total.' </h2>';
$mensaje.='   <a href="http://localhost/MecatoValluno/verpedido.php?id_venta='.$id_venta.'" style="background-color:yellowgreen ;color: white;padding: 10px;text-decoration: none;">
Ver Status del pedido
</a> ' ;
$mensaje.='<div>

<br><br><img src="https://raw.githubusercontent.com/Danner1998/MecatoValluno/main/images/detalles-empresariales.png">

</div> </body>';

$mensaje = wordwrap($mensaje, 70, "\r\n");
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados); #Mandar al final los encabezados
if ($resultado) {
    //echo "Correo enviado";
} else {
   // echo "Correo NO enviado";
}

?>



