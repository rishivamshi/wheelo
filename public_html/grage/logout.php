<?php 

/******Logging User Out By Removing All Sessions**************/
session_start();
session_unset();
session_destroy();
header("Location: index.php");       
?>
