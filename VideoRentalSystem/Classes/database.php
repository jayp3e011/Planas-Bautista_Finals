<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "video_rental";
$connection = mysql_connect($host,$user,$pass)or die('Unable to connect to database.');
$db=mysql_select_db($dbname,$connection)or die('Unable to connect to host.');
include_once 'class.user.php';
$user = new USER($db);
//$function = new Que($db);
?>