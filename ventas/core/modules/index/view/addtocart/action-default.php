<?php if(isset($_GET["product"]) && $_GET["product"]!=""):?>
	<?php
$products = ProductData::getLike($_GET["product"]);
if(count($products)>0){
	?>
<h3>Resultados de la Busqueda</h3>
<table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Nombre</th>
		<th>Enfermedad</th>
		
		<th>Precio unitario</th>
		<th>En inventario</th>
		<th>Cantidad</th>
	</thead>
	<?php
$products_in_cero=0;
	 foreach($products as $product):
$q= OperationData::getQYesF($product->id);
	?>
	<?php 



foreach ($_POST as $key => $entry)
{
	 print $key . ": " . $entry . "<br>";
	 echo $key . ": " . $entry . "<br>";
	 
}

	if($q>0):?>
		
	<tr class="<?php if($q<=$product->inventary_min){ echo "danger"; }?>">
		<td style="width:80px;"><?php echo $product->id; ?></td>
		<td><?php echo $product->name; ?></td>
		<td>
		<?php
$diseases = DiseaseData::getAll();
    ?>

   
           <select id="disease_id" name="disease_id"  class="form-control">
   
                 <?php foreach($diseases as $disease):?>
                     <option value="<?php echo $disease->id;?>"><?php echo $disease->name;?></option>
                 <?php endforeach;?>
            </select>
	    </td>
		
		<td><b>₡<?php echo $product->price_out; ?></b></td>
		<td>
			<?php echo $q; ?>
		</td>
		<td style="width:250px;">
		<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
		<input type="hidden" name="disease_id" value="<?php echo disease_id; ?>">
<div class="input-group">
		<input type="" class="form-control" required name="q" placeholder="Cantidad -...">



		
      <span class="input-group-btn">
		<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Agregar</button>
      </span>
    </div>


		</form></td>
	</tr>
	
<?php else:$products_in_cero++;
?>
<?php  endif; ?>
	<?php endforeach;?>
</table>
<?php if($products_in_cero>0){ echo "<p class='alert alert-warning'>Se omitieron <b>$products_in_cero productos</b> que no tienen existencias en el inventario. <a href='index.php?view=inventary'>Ir al Inventario</a></p>"; }?>

	<?php
}else{
	echo "<br><p class='alert alert-danger'>No se encontro el producto en esta busqueda</p>";
}
?>
<hr><br>
<?php else:
?>
<?php endif; ?>