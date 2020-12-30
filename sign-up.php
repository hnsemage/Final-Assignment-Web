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
  echo "<center><h3>Empty fields!</h3></center>";
  exit();
}

if(invalidUname($name) !==false)
{
	echo "<center><h3>Choose a proper user name!</h3></center>";
    exit();
}

if(invalidEmail($email) !==false)
{
	echo "<center><h3>Choose a proper email!</h3></center>";
    exit();
}

if(pwdMatch($pword,$cpwd) !==false)
{
	echo "<center><h3>Passwords doesn't match!</h3></center>";
    exit();
}

if(userIdExists($con,$name,$email) !==false)
{
	echo "<center><h3>User name already taken!</h3></center>";
    exit();
}


createUser($con,$name,$email,$pword);

}
else
{
	header("location:registration.html");
}
 




?>