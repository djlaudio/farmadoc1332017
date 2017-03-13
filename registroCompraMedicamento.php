<?php 

session_start();




$idCliente=$_POST['selClienteCombo'];

$observacion =$_POST['observacion'];

$fechaIngreso=gmdate("Y-m-d\TH:i:s\Z");
$padecimiento=$_POST['descrPadecimiento'];
$medicamento=$_POST['descrMedicamento'];

$precio =$_POST['precio'];

$idUsuario=$_SESSION['idUsuario'];

$_SESSION['credito']=$credito;


  require("connect_db.php");


  $sql="INSERT INTO padecimiento(idCliente, precio, observacion, fechaIngreso, padecimiento, medicamento) values ('$idCliente', '$precio', '$observacion', '$fechaIngreso', '$padecimiento','$medicamento')";



if (!mysqli_query($link,$sql)) {
     die('Error: ' . mysqli_error($link). $sql);
die('Error: ' . $sql);
   mysqli_rollback($link);
   echo "<p>Operacion incorrecta</p>";
   }
else
{
    $id=mysqli_insert_id($link);
    echo "<p>Datos de padecimiento insertados correctamente</p>. ";
    


if ($_SESSION['idTipoClientes']==1)
{

echo ("<script>alert('El tipo de cliente es 1')</script>");



echo "<script>window.history.back()</script>";


}
else if ($_SESSION['idTipoClientes']==2)
{


echo "<script>window.history.back()</script>";
//echo ("<script>location.href='$yourURL'</script>");


//print "<script>window.location='index.php?view=onesell&id=1';</script>";




}
    // do stuffs
  }
 
   
  mysqli_commit($link);
  mysqli_close($link);


?>