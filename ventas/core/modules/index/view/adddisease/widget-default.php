<?php

if(count($_POST)>0){
	$user = new DiseaseData();
	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=diseases';</script>";


}


?>