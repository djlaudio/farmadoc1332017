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
      <input type="number" name="price_in" required class="form-control" id="price_in" placeholder="Precio de entrada">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Precio de Salida con IV</label>
    <div class="col-md-6">
      <input type="number" name="price_out" required class="form-control" id="price_out" placeholder="Precio de salida">
    </div>
  </div>

  

  

  <!-- <div class="form-group">
    <label for="inputEmail2" class="col-lg-2 control-label">Costo real</label>
    <div class="col-md-6">
    <button type="submit" value="Submit">Submit</button>
    </div>
  </div> -->
  
  <div data-role="content">
        <div id="button" data-role="button">Calcular</div>
      </div>


</form>

	</div>
</div>

<script>

        $("#button").click( function()
           {
             costWoIV();
           }
        );


        function add() {
    a = $('#qProducts').val();
    b = $('#qProductsFree').val();
    var sum = parseInt(a) + parseInt(b);
    alert(sum);
  };


  function add() {
    a = $('#qProducts').val();
    b = $('#qProductsFree').val();
    var sum = parseInt(a) + parseInt(b);
    alert(sum);
  };


  function costPerItem() {
    a = $('#qProducts').val();
    b = $('#qProductsFree').val();
    c=  $('#price_in').val();
    d=  $('#discount').val();
    priceCost = (parseInt(c) * parseInt(a) - (parseInt(c) * parseInt(a) * parseInt(d)/100))   /   (parseInt(a) + parseInt(b)) ;
    //Want to know price per item. So if you have 10 and have 5 free, just divide cost price*qproducts and divide ito total products 15
    alert(priceCost);
  };

  function costWoIV() {
  
    c=  $('#price_in').val();
    d=  $('#price_out').val();
    priceCost = (parseInt(d)    /  1.13 ) ;
    //Want to know price per item. So if you have 10 and have 5 free, just divide cost price*qproducts and divide ito total 
    win=priceCost- parseInt(c);


    //
    alert('El precio de venta sin IV es ' + priceCost + ', y la gananacia es de ' + win + ' colones');
  };


    </script>