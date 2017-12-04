<?php

include '../config/config.php';
if(isset($_POST) && count($_POST)>0){

unset($_SESSION['error_login']);
unset($_SESSION['email']);
unset($_SESSION['username']);
unset($_SESSION['user_id']);
foreach ($_POST as $key => $value) {
	$$key=$value;
}

$query="SELECT * FROM `tbl_users` WHERE email='$username' AND password=md5('$password')";
//echo $query; exit;
$stmt = $con->query($query);
$number_of_rows = $stmt->num_rows;

if($number_of_rows>0){
	$row=$stmt->fetch_array();
	$_SESSION['user_id']=$row['user_id'];
	$_SESSION['email']=$row['email'];
	$_SESSION['username']=$row['fname'].' '.$row['lname'];
	header('location: ../home.php');
}else{

	$_SESSION['error_login']='Your Email Or Password Mismatch';
	header('location:../index.php');
}



}