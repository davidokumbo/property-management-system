<?php
// session start up and its constant
session_start();
define('SITEURL','http://localhost/km.rental%20management%20system/');
//database constants and connection
define('LOCALHOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'davido');
define('DBNAME', 'km_rentaldb');
$conn = mysqli_connect( LOCALHOST, USERNAME, PASSWORD) or die(mysqli_error($conn));   //connecting to overall database
 $selectdb = mysqli_select_db($conn, DBNAME) or die(mysqli_error($conn)); //selecting our database we created inside the overall database
?>