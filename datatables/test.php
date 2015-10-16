<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);


include_once "./lib/SqlHelper.php";
$sqlHelper = new SqlHelper(  );

$sql ="select * from user";

$res = $sqlHelper->execute_dql( $sql );

echo "<pre>";
var_dump( $res );