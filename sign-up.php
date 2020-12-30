<?php

include 'dbh.php';
include 'functions.php';

if(isset($_POST["submit"])){

$name=$_POST["uname"];
$email=$_POST["email"];
$pword=$_POST["pword"];
$cpwd=$_POST["cpass"];



if(emptyInputSignup($name,$email,$pword,$cpwd) !==false)//if one if the input field empty
{
  echo ("location:registration.html?error=emptyinput");
  exit();
}

if(invalidUname($name) !==false)
{
	echo "<br><h2>location:registration.html?error=invalidUserName</h2>";
    exit();
}

if(invalidEmail($email) !==false)
{
	echo "<h2><br>location:registration.html?error=invalidEmail</h2>";
    exit();
}



if(pwdMatch($pword,$cpwd) !==false)
{
	echo "<h2><br>location:registration.html?error=passwordsDontMatch</h2>";
    exit();
}

if(userIdExists($con,$name,$email) !==false)
{
	echo "<h2><br>location:registration.html?error=userName&emailTaken</h2>";
    exit();
}


createUser($con,$name,$email,$pword);

}
else
{
	echo "<br><h2>location:registration.html</h2>";
	
}
 




?>