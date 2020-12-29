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
  header("location:registration.html?error=emptyinput");
  exit();
}

if(invalidUname($name) !==false)
{
	header("location:registration.html?error=invalidUserName");
    exit();
}

if(invalidEmail($email) !==false)
{
	header("location:registration.html?error=invalidEmail");
    exit();
}



if(pwdMatch($pword,$cpwd) !==false)
{
	header("location:registration.html?error=passwordsDontMatch");
    exit();
}

if(userIdExists($con,$name,$email) !==false)
{
	header("location:registration.html?error=userName&emailTaken");
    exit();
}


createUser($con,$name,$email,$pword);

}
else
{
	header("location:registration.html");
	
}
 




?>