<?php

include '../config/config.php';
//var_dump($_POST);

$id= $_GET['id'];
$query="delete from vote where id='$id' ";
$result = $con->query($query);


header('location: ../nominee.php');
