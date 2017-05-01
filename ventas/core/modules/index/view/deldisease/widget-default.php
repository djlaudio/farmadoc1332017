<?php

$disease = Diseasedata::getById($_GET["id"]);


$disease->del();
Core::redir("./index.php?view=diseases");


?>