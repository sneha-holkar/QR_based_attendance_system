<?php
session_start();

include('../connection.php');
$sid=$_SESSION["sid"];
$r=mysqli_query($cn,"select name,rollno,year,class from studregister where sid=$sid");
$a=mysqli_fetch_array($r);
extract($a);
echo"<h1>".$name."</h1><h3>Welcome TO Your Attendance System</h3>";
include('header.php');
?>
<style>
*{
	color:white;
}
</style>
