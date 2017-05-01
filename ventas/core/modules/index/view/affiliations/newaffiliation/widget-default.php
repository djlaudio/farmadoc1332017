    <?php 
$categories = AffiliateData::getAll();
$clients = PersonData::getAll();
    ?>
<div class="row">
	<div class="col-md-12">
	<h1>Nueva Afiliación</h1>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addaffiliation" action="index.php?view=addaffiliation" role="form">

  
  
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
    <div class="col-md-6">
    <select name="client_id" class="form-control">
    <?php foreach($clients as $client):?>
      <option value="<?php echo $client->id;?>"><?php echo $client->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>

 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Empresa Afiliada</label>
    <div class="col-md-6">
    <select name="affiliated_id" class="form-control">
    <?php foreach($categories as $category):?>
      <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Numero de afiliación</label>
    <div class="col-md-6">
      <textarea name="affiliationNumber" class="form-control" id="affiliationNumber" placeholder="Número de afiliación"></textarea>
    </div>
  </div>
  

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Afiliación</button>
    </div>
  </div>
</form>

	</div>
</div>

<script>
  $(document).ready(function(){
    $("#product_code").keydown(function(e){
        if(e.which==17 || e.which==74 ){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    })
});

</script>