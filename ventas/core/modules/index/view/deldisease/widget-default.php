<?php

$disease = DiseaseData::getById($_GET["id"]);


$disease->del();
Core::redir("./index.php?view=diseases");


?>