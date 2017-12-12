<?php

include ('connect_db.php');

$clients = PersonData::getClients();

$the_Client= new PersonData();

?>

<section class="content">

<div class="row">

	<div class="col-md-12">

	<h1>Expediente Paciente</h1>



						<form>

						<input type="hidden" name="view" value="pacienteReports2">

<div class="row">

<div class="col-md-3">



<select name="client_id" id="client_id" class="form-control">

	<option value="">--  TODOS --</option>

	<?php foreach($clients as $p):?>

	<option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>

	<?php endforeach; ?>

</select>



</div>

<div class="col-md-3">

<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">

</div>

<div class="col-md-3">

<input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">

</div>



<div class="col-md-3">

<input type="submit" class="btn btn-success btn-block" value="Procesar">

</div>



</div>

<!--

<br>

<div class="row">

<div class="col-md-4">



<select name="mesero_id" class="form-control">

	<option value="">--  MESEROS --</option>

	<?php foreach($meseros as $p):?>

	<option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>

	<?php endforeach; ?>

</select>



</div>



<div class="col-md-4">



<select name="operation_type_id" class="form-control">

	<option value="1">VENTA</option>

</select>



</div>



</div>

-->

</form>



	</div>

	</div>

<br><!--- -->



<script>



$(document).ready(function(){

    $("#client_id").on('change', function(){





		alert("#client_id").val());

/* Lo siguiente es el valor del total menos el descuento */ 



    });

});

</script>





<div class="row">

	

	<div class="col-md-12">

		<?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>

<?php if($_GET["sd"]!=""&&$_GET["ed"]!=""):?>

			<?php 

			$operations = array();



				$date1= $_GET["sd"];

				$date2= $_GET["ed"];

				$client_id=  $_GET["client_id"];

          



			if($_GET["client_id"]==""){



				$query= "SELECT d.name enfermedad, s.id, o.q, p.name producto, d.name, s.created_at

				FROM disease d

				INNER JOIN operation o ON d.id = o.id_disease

				INNER JOIN sell s ON o.sell_id = s.id

				INNER JOIN product p ON p.id = o.product_id where s.created_at> '" .$date1  . "' and s.created_at <= '" .$date2  . "'";

							$countSells=mysqli_query($link,"SELECT count(*)

				FROM disease d

				INNER JOIN operation o ON d.id =  o.id_disease

				INNER JOIN sell s ON o.sell_id = s.id

				INNER JOIN product p ON p.id = o.product_id ");

				

            $find= mysqli_query($link,$query);

			}

			else{



$the_Client= PersonData::getById($client_id);

			

 				$query= "SELECT d.name enfermedad, s.id, o.q, p.name producto, d.name, s.created_at, pe.id, pe.name, pe.lastname, pe.created_at nacimiento

  FROM disease d

  INNER JOIN operation o ON d.id = o.id_disease

  INNER JOIN sell s ON o.sell_id = s.id

  INNER JOIN product p ON p.id = o.product_id

  INNER JOIN person pe ON s.person_id = pe.id where s.created_at> '" .$date1  . "' and s.created_at <= '" .$date2  . "' and pe.id= " . $client_id . "";

// 							$countSells=mysqli_query($link,"SELECT count(*)

// 				FROM disease d

// 				INNER JOIN operation o ON d.id = o.idDisease

// 				INNER JOIN sell s ON o.sell_id = s.id

// 				INNER JOIN product p ON p.id = o.product_id ");

// 			$operations = SellData::getAllLinesByDateBCOp($_GET["client_id"],$_GET["sd"],$_GET["ed"],2);



				$find= mysqli_query($link,$query);

			} 

			

			

			 ?>



			

                 <table class="table table-bordered table-hover	">



				 

               

					 <br>

             

                

             <thead>

                     <th></th>

                     <th> 

            

		   

             

            </th>

                     <th>Factura</th>

                     <th>Fecha</th>

                     <th>Enfermedad</th>

                 

                 </thead>

               <?php  

            

             

             

             while ($row = mysqli_fetch_array($find)) 

                 {?>

                  <tr>

                     <td style="width:30px;">

             

                     <a href="index.php?view=onesell&id=<?php echo $row['id']; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

             

                     <td>



 <?php echo $row['producto']; ?>

             

             <?php

             //$operations = OperationData::getAllProductsBySellId($row['id']);

             

             ?>

                     <td>

             

             <?php

             

                     echo $row['q'];

             

             ?>			

             

                     </td>

                     <td><?php echo $row['created_at']; ?></td>

			

                     

             

             

            

             

                     

                 </tr>

                 <?php } ?>

<script>

	$("#wellcome").hide();

</script>

<div class="jumbotron">


 Paciente: 

					 <?php echo $the_Client->name . " " . $the_Client->lastname ; ?>

					 <br>

					 Fecha de registro: 

					 <?php echo $the_Client->created_at; ?>

					 <?php echo $query;?>


</div>



			 <?php endif; ?>

<?php else:?>

<script>

	$("#wellcome").hide();

</script>

<div class="jumbotron">

	<h2>Fecha Incorrectas</h2>

	<p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>

</div>

<?php endif;?>



	

	</div>

</div>



<br><br><br><br>

</section>