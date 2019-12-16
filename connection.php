
<?php
session_start();



 
$db_username = 'root'; // Your MYSQL Username.
$db_password = ''; // Your MYSQL Password.
$db_name = 'complaint_system'; // MYSQL Database Name.
$db_host = 'localhost:3308';
 
$conDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('Error: Could not connect to MySQL database.');
?>