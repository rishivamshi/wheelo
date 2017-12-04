<?php

include '../config/config.php';

if(isset($_POST) && count($_POST)>0){

foreach ($_POST as $key => $value) {
	$$key=$value;
}


$query="INSERT INTO `tbl_users` SET `fname`='$fname', `lname`='$lname', `email`='$email', `password`=md5('$password'), `lastlogin`=now(), `city`='$city', `state`='$state', `zip`='$zip', `country`='$county'";


$stmt = $con->query($query);

	$_SESSION['success']='Account Created Please Login With Your Email and Password';
	header('location:../index.php');
}



