<?php

include '../config/config.php';
$order_id	=	$_GET['id'];
$user_id	=	$_SESSION['user_id'];
$status='4';

$query="Update users_order set  status='$status' where order_id='$order_id' and user_id='$user_id'  ";

$result = $con->query($query);

header('location: ../home.php');