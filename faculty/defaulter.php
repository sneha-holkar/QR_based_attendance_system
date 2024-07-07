<?php
session_start();
include("../connection.php");
$date=date("y-m-d");
$arrc=explode("-",$date);
$curdate=$arrc[1];
$yr=$arrc[0];
$mo=$arrc[1];
$da=$arrc[2];
?>
<center><br><br>
	<form method="POST" class='login-box' style='color:white;margin-top:150px;' >
	
	<lable>Select Class:</lable>
	<select id="class" name="class" class="user-box">
	<option value=TC>TC</option>
	<option value=CW>CW</option></select><br><br><br>
	<input type="submit" value="Check" name="btsub" style="color:black">
	</form> <br><br><br><br></center>
<?
if(isset($_POST['btsub']))
{
$class=$_POST["class"];
$q1="select * from qr where class='$class'";
	$rs1=mysqli_query($cn,$q1);
	if(mysqli_num_rows($rs1)>0)
	{
		echo"<center><h2>Total Attendance</h2><table style='border:1px white solid; padding:2px white;border-collapse: collapse;'><tr><th>Roll Number</th> <th>Count</th></tr>";
		while($a1=mysqli_fetch_assoc($rs1))
		{
			$qridq=$a1['qrid'];
			$date2=$a1['date'];
		}
	}
	
	
?>
<?php
include('header.php');
?>
<style>
* 
{
	color:white;
}

input[type=month],input[type=number],option{color:black}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  color:black;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
