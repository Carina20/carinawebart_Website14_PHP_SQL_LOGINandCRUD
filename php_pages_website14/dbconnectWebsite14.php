<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );
define ('DBHOST', 'localhost');
define('DBUSER', 'u187800db5');
define('DBPASS', '.nf301t4jh09');
define ('DBNAME', 'u187800db5');
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}
?>