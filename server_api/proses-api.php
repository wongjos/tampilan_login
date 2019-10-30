<?php

  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
  header("Content-Type: application/json; charset=utf-8");

  include "config/config.php";
  
  $postjson = json_decode(file_get_contents('php://input'), true);
  $today    = date('Y-m-d');


  if($postjson['aksi']=='register'){

  	$query = mysqli_query($mysqli, "INSERT INTO master_customer SET
  		name_customer = '$postjson[name_customer]',
  		desc_customer = '$postjson[desc_customer]',
  		created_at	  = '$today' 
  	");

  	$idcust = mysqli_insert_id($mysqli);

  	if($query) $result = json_encode(array('success'=>true, 'customerid'=>$idcust));
  	else $result = json_encode(array('success'=>false));

  	echo $result;

  }
?>