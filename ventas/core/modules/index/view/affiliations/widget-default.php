<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=newaffiliation" class="btn btn-default">Agregar Afiliacion</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/affiliations-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1>Lista de Afiliaciones</h1>
		<div class="clearfix"></div>






<?php
$page = 1;
if(isset($_GET["page"])){
	$page=$_GET["page"];
}
$limit=10;
if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
	$limit=$_GET["limit"];
}

$user_id = $_SESSION["user_id"];
$user = UserData::getById($user_id);
	

$products = AffiliationData::getAll();
if(count($products)>0){

if($page==1){
$curr_products = AffiliationData::getAllByPage($products[0]->id,$limit);
}else{
$curr_products = AffiliationData::getAllByPage($products[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($products)/$limit);
 $spaginas = count($products)%$limit;

if($spaginas>0){ $npaginas++;}

	?>

	<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
<div class="btn-group pull-right">
<?php
$px=$page-1;
if($px>0):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=affiliations&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
<?php endif; ?>

<?php 
$px=$page+1;
if($px<=$npaginas):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=affiliations&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
<?php endif; ?>
</div>
<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Cliente</th>
		<th>Empresa</th>
		<th>Numero de afiliación</th>
		
		<th></th>
	</thead>
	<?php foreach($curr_products as $product):?>
	<tr>


		<td><?php $client = $product->getPerson();
                    echo($client->name." ".$client->lastname);   ?>
                    </td>
		
		<td><?php $client = $product->getAffiliate();
                    echo($client->name);   ?>
                    </td>
		
		<td><?php echo $product->numAffiliation; ?></td>
		
		

		<td style="width:70px;">
		<?php if($user->is_admin):?>
   					
    					
		<a href="index.php?view=editaffiliation&id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a href="index.php?view=delaffiliation&id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		<?php endif; ?>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){
	echo "<a href='index.php?view=affiliations&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
}
?>
</div>
<form class="form-inline">
	<label for="limit">Limite</label>
	<input type="hidden" name="view" value="products">
	<input type="number" value=<?php echo $limit?> name="limit" style="width:60px;" class="form-control">
</form>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay productos</h2>
		<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>