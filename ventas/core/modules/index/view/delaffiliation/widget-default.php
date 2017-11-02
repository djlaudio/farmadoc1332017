<?php

$category = AffiliationData::getById($_GET["id"]);

$category->del();
Core::redir("./index.php?view=affiliations");


?>