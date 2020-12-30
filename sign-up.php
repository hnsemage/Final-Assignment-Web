<?php
include 'registration.html';
include 'dbh.php';
include 'functions.php';

if(isset($_POST["submit"])){

$name=$_POST["uname"];
$email=$_POST["email"];
$pword=$_POST["pword"];
$cpwd=$_POST["cpass"];



if(emptyInputSignup($name,$email,$pword,$cpwd) !==false)//if one if the input field empty
{
  echo "<br<center><h3>location:registration.html?error=emptyinput</h3></center>";
  exit();
}

if(invalidUname($name) !==false)
{
	echo "<br<center><h3>location:registration.html?error=invalidUserName</h3></center>";
    exit();
}

if(invalidEmail($email) !==false)
{
	echo "<br<center><h3>location:registration.html?error=invalidEmail</h3></center>";
    exit();
}



if(pwdMatch($pword,$cpwd) !==false)
{
	echo "<br<center><h3>location:registration.html?error=passwordsDontMatch</h3></center>";
    exit();
}

if(userIdExists($con,$name,$email) !==false)
{
	echo "<br<center><h3>location:registration.html?error=userName&emailTaken</h3></center>";
    exit();
}


createUser($con,$name,$email,$pword);

}
else
{
	echo "<br<center><h3>location:registration.html</h3></center>";
	
}
 




?>