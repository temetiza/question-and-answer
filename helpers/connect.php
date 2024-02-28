<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root."/config.php");

// require_once("../config.php");
// echo $_SERVER["DOCUMENT_ROOT"];

// Create connection

$sqlConnect  = mysqli_connect($sql_db_host, 
$sql_db_user, $sql_db_pass, $sql_db_name);

// DB creation
// if(!$sqlConnect){
//     echo ("Connected!!");
// }else{
//     echo "not Connected";
// }


?>