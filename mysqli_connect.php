<?php
//DATABASE CONNECTION FILE//
DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','assignment');

$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
OR die('Could Not Connect to My SQL'.mysqli_connect_error());

/*if($dbc){

	echo "Database Connection Successful";

}*/

//mysqli_set_charset($dbc, "utf8");

?>