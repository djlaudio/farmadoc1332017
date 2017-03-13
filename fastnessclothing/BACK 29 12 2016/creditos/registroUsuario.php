<?php 

$nombre=$_POST['nombre'];
$cedula=$_POST['cedula'];
$telefono1=$_POST['telefono1'];
$telefono2=$_POST['telefono2'];
$direccion=$_POST['direccion'];
$rol=$_POST['selRol'];
$comentarios=$_POST['comentarios'];
$correo=$_POST['correo'];
$time = time() + 7200;  
$fecha_hora = date('d-m-Y H:i:s', $time);  

$usuario=$_POST['usuario'];
$contra1=$_POST['pass'];
$contra2=$_POST['repPass'];
$area=$_POST['area'];

echo $rol;
echo $area;

if ($contra1 !== $contra2){
  echo 'Las contraseñas no coinciden.';
}else{



	require("connect_db.php");
//Primero registramos la persona en la db de Inventio
$contra1=md5($contra1);
	$sql="INSERT INTO person(name, address1, phone1, phone2) values ('$nombre','$direccion', '$telefono1', '$telefono2')" ;

	
	
	if (!mysqli_query($link,$sql)) {
     die('Error: ' . mysqli_error($link));
	 mysqli_rollback($link);
   }



	$contra1=md5($contra1);
	$sql="INSERT INTO persona(nombre, cedula, direccion, telefono1, telefono2, codigoProducto) values ('$nombre','$cedula','$direccion', '$telefono1', '$telefono2','2')" ;

	
	
	if (!mysqli_query($link,$sql)) {
     die('Error: ' . mysqli_error($link));
	 mysqli_rollback($link);
   }

   $idPersona= mysqli_insert_id($link);
   

echo 'Persona ingresada correctamente';
   $sql="INSERT INTO cliente(idPersona, calificacion, comentarios, idSistema) values ('$idPersona','$calificacion','$comentarios', '2')" ;

	
	
	if (!mysqli_query($link,$sql)) {
     die('Error: ' . mysqli_error($link));
	 mysqli_rollback($link);
   }
   echo 'Cliente ingresado correctamente';



 $sql="INSERT INTO usuario(usuario, clave, idRol, idPersona, idSistema, idArea) values ('$usuario','$contra1','$rol','$idPersona', '2','$rol' )" ;

	
	
	if (!mysqli_query($link,$sql)) {
     die('Error: ' . mysqli_error($link));
	 mysqli_rollback($link);
echo 'Usuario NO ingresado correctamente';
   }
   echo 'Usuario ingresado correctamente';

   
	mysqli_commit($link);
	mysqli_close($link);
}

?>