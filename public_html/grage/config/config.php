<?php
session_start();
/******SQL Server Credentials**************/

$DB_SERVER='shareddb1d.hosting.stackcp.net';
$DB_USERNAME='wheelo-32311cbb';
$DB_PASSWORD='wheelo-32311cbb';
$DB_DATABASE='wheelo-32311cbb';

$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD,$DB_DATABASE);
//print_r($con); exit;