<?php

$disease = Diseasedata::getById($_GET["id"]);
$products = ProductData::getAllByDiseaseId($disease->id);
foreach ($products as $product) {
	$product->del_disease();
}

$disease->del();
Core::redir("./index.php?view=diseases");


?>