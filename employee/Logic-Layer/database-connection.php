<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'leave_management_system');

$database_server = "localhost";
$database_username = "root";
$database_password = "";
$database_name = "leave_management_system";
 

/* Attempt to connect to MySQL database */
$conn = mysqli_connect($database_server,$database_username, $database_password, $database_name);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>

