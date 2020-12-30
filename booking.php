<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		include "bookingform.html";
		include "bookingfunction.php"
		include 'dbh.php';
		if(isset($_POST["submit"])){
			$firstname=$_POST["firstname"];
			$lastname=$_POST["lastname"];
			$checkin=$_POST["checkin"];
			$checkout=$_POST["checkout"];
			$room=$_POST["ROOM TYPE"];
			$adult=$_POST["ADULTS"];
			$child=$_POST["CHILDRENS"];

			if(emptyInputSignup($firstname,$lastname,$checkin,$checkout,$room,$adult,$child) !==false)
{
  echo "<br<center><h3>location:booking.html?error=emptyinput</h3></center>";
  exit();
}
if(userIdExists($con,$room,$checkin,$checkout) !==false)
{
	echo "<br<center><h3>location:registration.html?error=userName&emailTaken</h3>/center>";
    exit();
}
		}
	?>
</body>
</html>
