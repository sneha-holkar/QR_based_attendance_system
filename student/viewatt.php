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
	<center><form method='post' class='login-box' style='color:white;margin-top:10px;'><lable>Select Month:</lable><input type=month name=month class=user-box><input type=submit value=Check name=btnsub1 style='color:black'></form> <br></center>
	<?php
	$q1="select * from qr";
	$rs1=mysqli_query($cn,$q1);
	if(mysqli_num_rows($rs1)>0){
		echo"<center><h2>Month Wise Your Attendance</h2><table style='border:1px white solid; padding:2px white '><tr><th>Date</th><th>Subject</th></tr>";
		while($a1=mysqli_fetch_assoc($rs1))
		{
			$qrid=$a1['qrid'];
			$q2="select * from atttendance where sid=$sid";
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
	
if(isset($_POST['btnsub1']))
{
	extract($_POST);
	
	$q1="select * from qr";
	$rs1=mysqli_query($cn,$q1);
	if(mysqli_num_rows($rs1)>0){
		echo"<center><h2>Month Wise Your Attendance</h2><table style='border:1px white solid; padding:2px white '><tr><th>Date</th><th>Subject</th></tr>";
		while($a1=mysqli_fetch_assoc($rs1))
		{
			$qrid=$a1['qrid'];
			$atarray=explode("-",$qrid);
			$atmonth=$atarray[3]."-".$atarray[4];
			$q2="select * from atttendance where sid=$sid";
			$rs2=mysqli_query($cn,$q2);
	        if(mysqli_num_rows($rs2)>0)
			{
			while($a2=mysqli_fetch_assoc($rs2))
			{
				$qrrid=$a2['qrid'];
				$date2=$a1['date'];
				$sub=$a1['subject'];
				$ar2=explode("-",$qrrid);
				$mon=$ar2[3]."-".$ar2[4];
								if($qrrid==$qrid && $month==$mon && $month==$atmonth )
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

echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
include('header.php');
?>
<style>
*
{
	color:white;
}
</style>