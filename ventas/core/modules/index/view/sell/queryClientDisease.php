<?php

include ('connect_db.php');

$idDisease= $_POST['idDisease'];
$idClient= $_POST['idClient'];


?>



<div class="form-group">
    
<table class="table table-bordered table-hover	">
	


    <?php

$count=mysqli_query($link,"SELECT count from sell WHERE person_id=$idClient and idDisease= $idDisease");
$find= mysqli_query($link,"SELECT * from sell WHERE person_id=$idClient and idDisease= $idDisease");

if ($count>0)
{ ?>
<thead>
		<th></th>
		<th>Producto</th>
		<th>Total</th>
		<th>Fecha</th>
		<th>Numero</th>
	
	</thead>
  <?php  
}


while ($row = mysqli_fetch_array($find)) 
	{?>
     <tr>
		<td style="width:30px;">

		<a href="index.php?view=onesell&id=<?php echo $row['id']; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

		<td>

<?php
//$operations = OperationData::getAllProductsBySellId($row['id']);

?>
		<td>

<?php
$total= $row['total']-$row['discount'];
	/*foreach($operations as $operation){
		$product  = $operation->getProduct();
		$total += $operation->q*$product->price_out;
	}*/
		echo "<b>‎₡ ".number_format($row['total'])."</b>";

?>			

		</td>
		<td><?php echo $row['created_at']; ?></td>

		<td><?php echo $sell->$row['id']; ?></td>


<?php if($user->is_admin):?>
   					
    					
		<td style="width:30px;"><a href="index.php?view=delsell&id=<?php echo $row['id  ']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>

		
		<?php endif; ?>

		
	</tr>
    <?php } ?>
      </select>
    </div>
  </div>




	






























