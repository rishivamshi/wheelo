<?php

include '../config/config.php';
$order_id	=	$_GET['id'];
$user_id	=	$_SESSION['user_id'];
$status='1';

$query="UPDATE users_order set  status='$status' WHERE order_id='$order_id' AND user_id='$user_id' ";
$result = $con->query($query);

header('location: ../home.php');
