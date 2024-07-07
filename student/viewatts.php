<?php
session_start();
include("../connection.php");
$sid=$_SESSION["sid"];

$date=date("y-m-d");
$arr1=explode("-",$date);
$yr=$arr1[0];
$mo=$arr1[1];
$da=$arr1[2];

?>
	<center><br><br>
	<form method="get" class='login-box' style='color:white;margin-top:150px;'>
	<lable>Select Semester:</lable>
	<select id="yer" name="yer" class="user-box">
	<option value=1>Sem 1</option>
	<option value=2>Sem 2</option></select>
	<input type="submit" value="Check" name="btsub" style="color:black">
	</form> <br><br><br><br></center>
	<?php
if(isset($_GET['btsub']))
{
	extract($_GET);
	$q1="select * from qr";
	$rs1=mysqli_query($cn,$q1);
	if(mysqli_num_rows($rs1)>0){
		echo"<center><h2>Sem Wise Your Attendance</h2><table style='border:1px white solid; padding:2px white '><tr><th>Date</th><th>Subject</th></tr>";
		while($a1=mysqli_fetch_assoc($rs1))
		{
			$qrid=$a1['qrid'];
			$q2="select * from atttendance where sid=$sid and year=$yer";
			$rs2=mysqli_query($cn,$q2);
	        if(mysqli_num_rows($rs2)>0)
			{
			while($a2=mysqli_fetch_assoc($rs2))
			{
				$qrrid=$a2['qrid'];
				$date2=$a1['date'];
				$sub=$a1['subject'];
				$ar2=explode("-",$qrrid);
				$mon=$ar2[4];
				if($qrrid==$qrid && $mo==$mon)
				{
					echo"<tr><td>".$date2."</td><td>".$sub."</td></tr></table><center>";
				}
			}
			}
			else{
					echo"---";
				}
			
		}
	}
}

include('header.php');
?>
<style>
* 
{
	color:white;
}
select{color:black}
option{color:black}
</style>