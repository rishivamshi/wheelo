<?php

include '../config/config.php';
//var_dump($_POST);

if(isset($_POST) && count($_POST)>0){

foreach ($_POST as $key => $value) {
	$$key=$value;
}

//SELECT `id`, `nominee`,  `category`, `total_vote`, `picture` FROM `` WHERE 1
$picture_name=$_FILES['picture']['name'];
$file_tmp=$_FILES['picture']['tmp_name'];
move_uploaded_file($file_tmp,"../uploads/".$picture_name);
$query="Update `orders` set `order_name`='$order_name', `decription`='$decription', `picture`='$picture_name' where id='$id' ";


$result = $con->query($query);


header('location: ../order_mangment.php');
}