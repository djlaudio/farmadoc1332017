<?php
session_start();

foreach($_SESSION as $nombre => $valor){
// aqui cojes el valor
echo "El valor de session $nombre es: $valor";
$valores = $valor;
}
//$to = "marcasgenuinas258@gmail.com";
$to = "djluigi@gmail.com";

$_SESSION['saldoDespuesDeAbono'];
$subject = "Prueba de email";
$txt = "Esto es un email de prueba para ver que la funcion corra.";
//$txt = "HOLA";
$headers = "From: consultas@djlproductions.com" . "\r\n" .
"CC: celdjl@gmail.com";

mail($to,$subject,$txt,$headers);
echo "SMS Enviado exitosamente!"; 
?>

