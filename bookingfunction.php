<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		function emptyNameFields($firstname,$lastname)
{
  $result;
  if(empty($firstname) || empty($lastname)){
   $result=true;
   }
   else
   {
   	$result=false;
   }
return $result;
}
function emptyDateFields($checkin,$checkout)
{
  $result;
  if(empty($checkin) || empty($checkout)){
   $result=true;
   }
   else
   {
   	$result=false;
   }
return $result;
}
function emptySelection($room,$adult,$child){
	$result;
	if (empty($room) || empty($adult) || empty($child)) {
	$result=true;
   }
   else
   {
   	$result=false;	
	}
}
function userIdExists($con,$room,$checkin,$checkout)
{
	$sql="SELECT * FROM book WHERE roomID=? AND BETWEEN $checkin AND $checkout; ";
	$stmt=mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "<br><center><h3>location:booking.html?error=stmtFailed</h3></center>" ;
        exit();
	}
	mysqli_stmt_bind_param($stmt,"sss",$room,$checkin,$checkout);
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

function createUser($con,$firstname,$lastname,$checkin,$checkout,$room,$adult,$chil)
{
	$sql="INSERT INTO book(Firstname,Lastname,CheckIn,CheckOut,Room,Adult,Child)VALUES(?,?,?,?,?,?,?)";
	$stmt=mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "<br><center><h3>location:booking.html?error=stmtFailed</h3></center>";
        exit();
	}
}
	?>
</body>
</html>