<html>
<head></head>
<body>
<?php
$serverName="localhost";
$userName="root";
$pword="";
$dbName="hotel";

$con=mysqli_connect($serverName,$userName,$pword,$dbName);
if(!$con)
{
	die("<h3><center>Connection failed: ".mysqli_connect_error()</center></h3>);
}

?>
</body>
</html>