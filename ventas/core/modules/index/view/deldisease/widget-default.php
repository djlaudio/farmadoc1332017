<?php

$disease = Diseasedata::getById($_GET["id"]);
$products = ProductData::getAllByDiseaseId($disease->id);

$disease->del();
Core::redir("./index.php?view=diseases");


?>