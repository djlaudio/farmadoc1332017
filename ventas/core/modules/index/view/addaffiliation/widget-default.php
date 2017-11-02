<?php


if(count($_POST)>0){
  $affiliation = new AffiliationData();
  $affiliation->numAffiliation = $_POST["affiliationNumber"];
  $affiliation->idClient = $_POST["client_id"];
  $affiliation->idAffiliated = $_POST["affiliated_id"];
 

   $affiliation-> add();



print "<script>window.location='index.php?view=affiliations';</script>";


}


?>