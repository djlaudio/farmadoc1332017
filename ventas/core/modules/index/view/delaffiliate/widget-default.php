<?php

$category = AffiliateData::getById($_GET["id"]);

$category->del();
Core::redir("./index.php?view=affiliates");


?>