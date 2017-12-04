<?php

include '../config/config.php';

if(isset($_POST) && count($_POST)>0){

foreach ($_POST as $key => $value) {
	$$key=$value;
}

$query="SELECT * FROM `tbl_admin` WHERE username='$username' || email='$username' AND password=md5($password)";

$stmt = $con->query($query);
$number_of_rows = $stmt->num_rows;
if($number_of_rows>0){
	$row=$stmt->fetch_array();
	$_SESSION['email']=$row['email'];
	$_SESSION['username']=$row['username'];
	$_SESSION['admin']='1';
	header('location: ../home.php');
}else{

	$_SESSION['error_login']='Your Email Or Password Mismatch';
	header('location:../index.php');
}



}