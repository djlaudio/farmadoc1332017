



<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Imprimir <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/onesell-print%20-%20idea%20POS.php?id=<?php echo $_GET["id"];?>">Original</a></li>
    <li><a href="report/djlonesell-pos.php?id=<?php echo $_GET["id"];?>">Copia</a></li>
  </ul>
</div>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> PDF <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/onesell-word.php?id=<?php echo $_GET["id"];?>">Original</a></li>
    <li><a href="report/onesell-copy.php?id=<?php echo $_GET["id"];?>">Copia</a></li>
  </ul>
</div>
<h1>Resumen de Venta</h1>
<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
<?php



$sell = SellData::getById($_GET["id"]);
$operations = OperationData::getAllProductsBySellId($_GET["id"]);
$total = 0;
$ivValue = 0;


$a;

 switch ($sell->termino_id) {
        case 135:
            $a = "Contado (Factura cancelada)";
            break;
        case 137:
            $a = "Credito 30 dias";
            break;
       

            case 141:
            $a = "Credito 45 dias";
            break;

             case 143:
            $a = "Credito 60 dias";
            break;




}


?>
<?php
if(isset($_COOKIE["selled"])){
	foreach ($operations as $operation) {
//		print_r($operation);
		$qx = OperationData::getQYesF($operation->product_id);
		// print "qx=$qx";
			$p = $operation->getProduct();
		if($qx==0){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> no tiene existencias en inventario.</p>";
		}else if($qx<=$p->inventary_min/2){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene muy pocas existencias en inventario.</p>";
		}else if($qx<=$p->inventary_min){
			echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene pocas existencias en inventario.</p>";
		}
	}
	setcookie("selled","",time()-18600);
}

?>
<table class="table table-bordered">
<?php if($sell->person_id!=""):
$client = $sell->getPerson();
?>
<tr>
	<td style="width:150px;">Cliente</td>
	
	<td><?php echo $sell->custom_client_name;?></td>
</tr>

<?php endif; ?>
<?php if($sell->user_id!=""):
$user = $sell->getUser();
?>
<tr>
	<td>Atendido por</td>
	<td><?php echo $user->name." ".$user->lastname;?></td>
</tr>
<?php endif; ?>
</table>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Cantidad</th>
		<th>Nombre del Producto</th>
		
		<th>Precio Unitario</th>
		<th>Total</th>

	</thead>
<?php
	foreach($operations as $operation){
		$product  = $operation->getProduct();
?>
<tr>
	<td><?php echo $product->id ;?></td>
	<td><?php echo $operation->q ;?></td>
	<td><?php echo $product->name ;?></td>

	

	
	<td>₡ <?php echo number_format($product->price_out,2,".",",") ;?></td>
	<td><b>₡ <?php echo number_format($operation->q*$product->price_out,2,".",",");$total+=$operation->q*$product->price_out;?></b></td>
</tr>
<?php
	}
	?>
</table>
<br><br>
<div class="row">
<div class="col-md-4">
<table class="table table-bordered">
	<tr>
		<td><h4>Descuento:</h4></td>
		<td><h4>₡ <?php echo number_format($sell->discount,0,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Subtotal:</h4></td>
		<td><h4>₡ <?php echo number_format(($total-	$sell->discount),0,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>IV:</h4></td>
		<td><h4>₡ <?php echo number_format(($ivValue),2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Total:</h4></td>
		<td><h4>₡ <?php echo number_format($total-	$sell->discount + $ivValue,0,'.',','); ?></h4></td>
	</tr>
</table>


</div>
</div>
<div class="btn-group pull-right">
<?php if($user->is_admin):?>
   					
    						
		

		
		<?php endif; ?>

</div>

<!-- //Next lines to send email to print -->

<?php
//$name = $_POST['name']; //'name' has to be the same as the name value on the form input element
$email = 'celdjl@gmail.com';
$message = 'celdjl@gmail.com';
$from = 'celdjl@gmail.com';
$to = 'segurobot@gmail.com'; //set to the default email address
$subject = $sell->termino_id;
$body = $sell->termino_id;

$headers = "From: $email" . "\r\n" .
"Reply-To: $email" . "\r\n" .
"X-Mailer: PHP/" . phpversion();

              
mail ($to, $subject, $body, $headers);  //mail sends it to the SMTP server side which sends the email
    echo "<p>Your message has been sent!</p>";



?>


<?php else:?>
	501 Internal Error
<?php endif; ?>
