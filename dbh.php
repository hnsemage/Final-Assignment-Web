<?php

$serverName="localhost";
$userName="root";
$pword="";
$dbName="hotel";

$con=mysqli_connect($serverName,$userName,$pword,$dbName);

if(!$con)
{
	die("Connection failed: ".mysqli_connect_error());
}
else
{
	echo "Successfully connected to the database";
}

?>