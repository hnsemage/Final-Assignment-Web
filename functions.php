<?php

function emptyInputSignup($name,$email,$pword,$cpwd)
{
  $result;
  if(empty($name) || empty($email) || empty($pword) || empty($cpwd) ){
   $result=true;
   }
   else
   {
   	$result=false;
   }
return $result;
}


function invalidUname($name)
{
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/",$name))
	{
		$result=true;
	}
	else
   {
   	$result=false;
   }
   return $result;
}

function invalidEmail($email)
{
	$result;
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$result=true;
	}
	else
   {
   	$result=false;
   }
   return $result;
}



function pwdMatch($pword,$cpwd)
{
	$result;
	if($pword !==$cpwd)
	{
		$result=true;
	}
	else
   {
   	$result=false;
   }
   return $result;
}

function userIdExists($con,$name,$email)
{
	$sql="SELECT * FROM user WHERE userName=? OR userEmail=?;";
	$stmt=mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "<center><h3>Something went wrong,try again!</h3></center>";
        exit();
	}
	mysqli_stmt_bind_param($stmt,"ss",$name,$email);
	mysqli_stmt_execute($stmt);

	$resultData=mysqli_stmt_get_result($stmt);

	if($row=mysqli_fetch_assoc($resultData))
	{
       return $row;
	}
	else
	{
		$result=false;
		return $result;
	}
    mysqli_stmt_close($stmt);
}

function createUser($con,$name,$email,$pword)
{
	$sql="INSERT INTO user(userName,userEmail,passWord)VALUES(?,?,?)";
	$stmt=mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
	      echo "<center><h3>Something went wrong,try again!</h3></center>";
        exit();
	}

	

	mysqli_stmt_bind_param($stmt,"sss",$name,$email,$pword);
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "<center><h3>You have signed up!</h3></center>";
    exit();
}

