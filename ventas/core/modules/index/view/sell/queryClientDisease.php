<?php

include ('connect_db.php');

$idDisease= $_POST['idDisease'];
$idClient= $_POST['idClient'];


?>



<div class="form-group">
    
<table class="table table-bordered table-hover	">
	<thead>
		<th></th>
		<th>Producto</th>
		<th>Total</th>
		<th>Fecha</th>
		<th>Numero</th>
		<th></th>
	</thead>


    <?php
$find= mysqli_query($link,"SELECT * from sell WHERE person_id=$idClient and idDisease= $idDisease");
while ($row = mysqli_fetch_array($find)) 
	{?>
     <tr>
		<td style="width:30px;">
		<a href="index.php?view=onesell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

		<td>

<?php
$operations = OperationData::getAllProductsBySellId($sell->id);
echo count($operations);
?>
		<td>

<?php
$total= $sell->total-$sell->discount;
	/*foreach($operations as $operation){
		$product  = $operation->getProduct();
		$total += $operation->q*$product->price_out;
	}*/
		echo "<b>‎₡ ".number_format($total)."</b>";

?>			

		</td>
		<td><?php echo $sell->created_at; ?></td>

		<td><?php echo $sell->id2; ?></td>


<?php if($user->is_admin):?>
   					
    					
		<td style="width:30px;"><a href="index.php?view=delsell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>

		
		<?php endif; ?>

		
	</tr>
    <?php } ?>
      </select>
    </div>
  </div>




	






























	<?php foreach($products as $sell):?>

	

<?php endforeach; ?>