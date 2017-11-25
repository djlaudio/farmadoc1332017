    <?php 
$categories = CategoryData::getAll();
    ?>
<div class="row">
	<div class="col-md-12">
	Calculo de costos
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=addproduct" role="form">

  
  
 
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Costo*</label>
    <div class="col-md-6">
      <input type="text" name="price_in" required class="form-control" id="price_in" placeholder="Precio de entrada">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad de productos</label>
    <div class="col-md-6">
      <input type="text" name="qProducts" required class="form-control" id="qProducts" placeholder="Cantidad de productos">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad de productos de regalia</label>
    <div class="col-md-6">
      <input type="text" name="qProductsFree" required class="form-control" id="qProductsFree" placeholder="Cantidad de productos de regalia">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Porcentaje de descuento</label>
    <div class="col-md-6">
      <input type="text" name="discount" required class="form-control" id="discount" placeholder="Porcentaje de descuento">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Salida</label>
    <div class="col-md-6">
      <input type="text" name="price_out" required class="form-control" id="price_out" placeholder="Precio de salida">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Costo real</label>
    <div class="col-md-6">
      <input type="text" name="price_cost" required class="form-control" id="price_cost" placeholder="Precio de costo">
    </div>
  </div>
  



</form>

	</div>
</div>

<script>
  $(document).ready(function(){
    $("#discount").keydown(function(e){
        if(e.which==17 || e.which==74 ){
            e.preventDefault();
        }else{
            console.log(e.which);
            $qProducts=$("#qProducts").val();
            $qProductsFree=$("#qProductsFree").val();
            $total_iv=(float)$qProducts+(float)$qProductsFree;
            $("#price_cost").val($total_iv);
        }
    })
});

</script>