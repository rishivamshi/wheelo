<?php

include '../config/config.php';
//var_dump($_POST);

$id= $_GET['id'];
$query="delete from orders where id='$id' ";
$result = $con->query($query);


header('location: ../order_mangment.php');
