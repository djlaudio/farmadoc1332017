<?php
include('connect_db.php');
		
		
$idPersona = $_POST['idPersona'];
$cuenta	=1;		
$find = mysqli_query($link, "SELECT pe.phone1, pe.phone2, pe.name, pe.address1 
							FROM  person pe 
							where pe.id = $idPersona 
							ORDER BY pe.name");

while ($row = mysqli_fetch_array($find))
{

// Lo siguiente se hace para que no cargue varios datos del contacto. Aunque por la consulta no deberia ya que solo hay un credito.
if ($cuenta==1)

{

?>


<?php
if(strlen($row['phone1'] > 0))
{ ?>
	<div class="form-group">
		<label class="col-sm-4 control-label" for="nombreClienteCustom"></label>
		<div class="col-sm-8">
			
			<input type="text" name="nombreClienteCustom"	  id="nombreClienteCustom"  value="<?php echo $row['name']; ?>">	    		        		    
		</div>
	</div>
<?php } ?>

<div class="form-group">
<?php
$smstext= "Se ha hecho una factura a su nombre por " . $_POST['total'] . " colones, con un término de pago de " . $_POST['termino_id'] . " colones.";
?>

<input type="hidden" name="smsmessage" value="<?php echo $smstext; ?> ">


<?php
$cuenta=2;
}

}
				
exit;
?>