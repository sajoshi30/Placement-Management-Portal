<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'sql100.byethost33.com');
define('DB_USERNAME', 'b33_28783797');
define('DB_PASSWORD', 'shreeda@12');
define('DB_NAME', 'b33_28783797_placementcomp');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>