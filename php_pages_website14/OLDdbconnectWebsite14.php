<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );
define ('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define ('DBNAME', 'eventpage_php');
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}
?>