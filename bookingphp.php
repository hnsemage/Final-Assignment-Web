
<?php

        include "bookingform.html";
        include "bookingfunction.php"
        include 'dbh.php';

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$phone=$_POST["phone"];
$arrive = $_POST["arrive"];
$depart = $_POST["depart"];
$room=$_POST["ROOM TYPE"];
$adult = $_POST["ADULTS"];
$child =$_POST["CHILDRENS"];
$flag=TRUE;


if($firstname=="")
{
    echo "<script> alert ('Please Enter the First Name ');</script>";
    $flag = FALSE;
}
if($lastname=="")
{
    echo "<script> alert ('Please Enter the Last Name ');</script>";
    $flag = FALSE;
}
if($phone=="")
{
    echo "<script> alert ('Please Enter the Phone Number ');</script>";
    $flag = FALSE;
}
if($arrive == "" || $depart == ""){
    echo "<script> alert('Both Arrival & Departing dates Are Required');</script>";
    $flag = FALSE;
}
if($adult == "Choose" || $child == "Choose"){
    echo "<script> alert('Please Select The Number of Adults & Children');</script>";
    $flag = FALSE;
}
if($room == "Choose"){
    echo "<script> alert('Please Select A Room Type');</script>";
    $flag = FALSE;
}

if($flag!=FALSE)
{
    if(isset($_POST["submit"]))
    {
    $qry1 ="SELECT * FROM $category WHERE Statuss='Yes';";

    $res = $con->query($qry1);
    if($res->num_rows > 0)
    {
        $row = $res -> fetch_assoc();
        $RoomNo =$row["RoomNo"];
        $Status =$row["Statuss"];

        $qry2= "UPDATE $category SET Statuss ='No' WHERE RoomNo =$RoomNo;";
        $con->query($qry2);

        $qry3 = "INSERT INTO booking (FirstName,LastName,Phone,ArrivalDate,DepartureDate,Room Type,Adult,Children) VALUES ('$firstname','$lastname','$phone,'$arrive','$depart',$adult,$child,'$room');";

        if($con->query($qry3))
        {
            echo "<script > alert ('Reserved Succsessfuly'); window.location.href='../html/booking.html';</script>";
        }
        else
        {
            echo "<script > alert ('Some Thing Not Right !, Please Try Again..'); window.location.href='../html/booking.html';</script>";
        }

    }
    else
    {
        echo "<script > alert ('This Category is already Full ! , Please choose another category..'); window.location.href='../html/booking.html';</script>";
    }
}


}
else
{
    
  echo "<script> window.location='../html/booking.html';</script>";
}




$con->close();
?>

</body>
</html>