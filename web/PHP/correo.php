<?php
//cargar las variables
$resp = array();
$mensaje = array();
$correo_rec=$_POST['env_correo'];
$nombre = $correo_rec[0];
$correo=$correo_rec[1];
$mensaje[0]="HUAWEI ASCEND Y300 CANTIDAD:".$correo_rec[2];
$mensaje[1]="VERYKOOL S-400 CANTIDAD:".$correo_rec[3];
$mensaje[2]="VERYKOOL I-126 CANTIDAD:".$correo_rec[4];
$mensaje[3]="VERYKOOL S-5012 CANTIDAD:".$correo_rec[5];
$mensaje[4]="VERYKOOL S-401 CANTIDAD:".$correo_rec[6];
$mensaje[5]="PROTECTOR IP5 CANTIDAD:".$correo_rec[7];
$mensaje[6]="PROTECTOR S5 CANTIDAD:".$correo_rec[8];
$mensaje[7]="PROTECTOR S3 CANTIDAD:".$correo_rec[9];

// Varios destinatarios
$email_to  = 'rflugaresir@gmail.com'; // atención a la coma

// título
$asunto = "$correo-Pedido de Celulares";

// mensaje
$contenido = "
<html>
<head>
  <title>PEDIDO DE CELULARES</title>
</head>
<body>
  <p>$correo</p>
  <p>¡Pedido!</p>
  <table>
    <tr>
      <th align=left>MODELO</th><th>CANTIDAD</th>
    </tr>
    <tr>
      <td>HUAWEI ASCEND Y300</td><td align=center>$correo_rec[2]</td>
    </tr>
    <tr>
      <td>VERYKOOL S-400</td><td align=center>$correo_rec[3]</td>
    </tr>
    <tr>
      <td>VERYKOOL I-126</td><td align=center>$correo_rec[4]</td>
    </tr>
    <tr>
      <td>VERYKOOL S-5012</td><td align=center>$correo_rec[5]</td>
    </tr>
    <tr>
      <td>VERYKOOL S-401</td><td align=center>$correo_rec[6]</td>
    </tr>
  </table>
</body>
</html>
";

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= "To: CatalogoCelulares <$correo>" . "\r\n";
$cabeceras .= "From: '$nombre' <$correo>" . "\r\n".
	"Reply-To: $correo" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();
	// Enviarlo
//mail($para, $título, $mensaje, $cabeceras);
/*


$contenido = "Detalles de la orden de pedido:\n\n";
$contenido .="Datos del Cliente:". "\n";
$contenido .=$nombre. "\n";
$contenido .=$correo."\n\n";
$contenido .="Datos del Pedido:". "\n";
$contenido .=$mensaje[0]. "\n";
$contenido .=$mensaje[1]. "\n";
$contenido .=$mensaje[2]. "\n";
$contenido .=$mensaje[3]. "\n";
$contenido .=$mensaje[4]. "\n";
$contenido .=$mensaje[5]. "\n";
$contenido .=$mensaje[6]. "\n";
$contenido .=$mensaje[7]. "\n";

$cabeceras = 'From: catalogocelulares@gmail.com'."\r\n".
'Reply-To: '.$correo."\r\n" .
'X-Mailer: PHP/' . phpversion();

$asunto = "Pedido de celular"; 
$email_to = "catalogocelulares@gmail.com";

/*
$email_to = "rflugaresir@gmail.com" . ",";
$email_to .= "gbello1900@gmail.com"; */

if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {
	$resp[]="si";
}else{
	$resp[]="no";
}
echo json_encode($resp);
?>