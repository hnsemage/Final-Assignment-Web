<?php

include 'dbh.php';
include 'loginIN.html';

  $uname=$_POST["username"];
  $pwd=$_POST["pword"];

    
  //to prevent mysql injection
  $uname=stripcslashes($uname);
  $pwd=stripcslashes($pwd);
  
    $uname= mysqli_real_escape_string($con,$uname);
    $pwd= mysqli_real_escape_string($con,$pwd);
 
  //query
  $sql="SELECT * FROM user WHERE userName='$uname' AND passWord='$pwd'";
  $result=mysqli_query($con,$sql);
             
  $row=mysqli_fetch_array($result);
  if($row['userName']==$uname && $row['passWord']== $pwd)
  {
    $name=$row['userName'];
    echo "<center><h3>Login successful! Welcome ".$name."</h3></center>";
    header("location:bookingform.html");
      
  } 
  else
  {
    echo "<center><h3>Failed to login</h3></center>";
  }






?>