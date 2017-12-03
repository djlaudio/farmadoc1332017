<?php
include ('connect_db.php');

$idClient= $_POST['idClient'];
// $idDisease= $_POST['idDisease'];
$find = mysqli_query($link, "SELECT * from sell");

while ($row= mysqli_fetch_array($find)) {



{ ?>
	<div class="form-group">
		<label class="col-sm-4 control-label" for="tel1">Teléfono 1</label>
		<div class="col-sm-8">
			<a href="" name="id2" id="id2" > <?php echo $row['id2']; ?> </a>
<input type="hidden" name="id2" value="<?php echo $row['id2']; ?>">	    		    
		</div>
	</div>

}

}



?>