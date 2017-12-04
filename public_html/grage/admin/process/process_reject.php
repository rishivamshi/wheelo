<?php

include '../config/config.php';
$order_id	=	$_GET['id'];
$user_id	=	$_GET['user_id'];;
$status='3';

$query="Update users_order set  status='$status' where order_id='$order_id' and user_id='$user_id'  ";
//echo $query; exit;
$result = $con->query($query);

header('location: ../new_orders.php');