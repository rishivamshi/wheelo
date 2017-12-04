<?php

include '../config/config.php';
$order_id	=	$_GET['id'];
$user_id	=	$_SESSION['user_id'];
$status='1';

$query="INSERT INTO users_order set order_id='$order_id', user_id='$user_id', status='$status' ";
$result = $con->query($query);

header('location: ../home.php');
