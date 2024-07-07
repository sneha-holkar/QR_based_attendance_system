<?php
session_start();
include("../connection.php");
?>
	<center><br><br>
	<form method="POST" class='login-box' style='color:white;margin-top:550px;' >
	<lable>Select Month:</lable>
	<input type="month" name="month">
	<br><br><br>
	<lable>Roll Number:</lable>
	<input type="number" name="rollno" min=1 max=126 class="user-box"><br><br><br>
	<lable>Select Class:</lable>
	<select id="class" name="class" class="user-box">
	<option value=TC>TC</option>
	<option value=CW>CW</option></select><br><br><br>
	<lable>Select Subject:</lable>
	 <select name="sub" id="sub">
	   <option>Subject</option>
	   <option value="OS">OS</option>
	   <option value="JAVA">JAVA</option>
        <option value="SPM">SPM</option>
		<option value="Python">Python</option>
		<option value="OT">OT</option>
		<option value="ADBMS">ADBMS</option>
	   </select>  <br><br><br>
	<input type="submit" value="Check" name="btsub" style="color:black">
	</form> <br><br><br><br></center>
	<?php
if(isset($_POST['btsub']))
{
	extract($_POST);
	$sub=$_POST["sub"];
	$class=$_POST["class"];
	$month=$_POST["month"];
	
	$q1="select * from qr where subject='$sub' and class='$class'";
	$rs1=mysqli_query($cn,$q1);
	if(mysqli_num_rows($rs1)>0){
		echo"<center><h2>Month Wise Your Attendance</h2><table style='border:1px white solid; padding:2px white;border-collapse: collapse; '><tr><th>Date</th><th>Roll Number</th></tr>";
		while($a1=mysqli_fetch_assoc($rs1))
		{
			$qridq=$a1['qrid'];
			$date2=$a1['date'];
			$arr=explode("-",$qridq);
			$qdate=$arr[3]."-".$arr[4];
			$q2="select * from atttendance where subject='$sub' and class='$class' and rollno='$rollno'";
			$rs2=mysqli_query($cn,$q2);
	        if(mysqli_num_rows($rs2)>0)
			{
			while($a2=mysqli_fetch_assoc($rs2))
			{
				$qrrid=$a2['qrid'];
				$roll=$a2['rollno'];
				$arr1=explode("-",$qrrid);
			    $adate=$arr1[3]."-".$arr1[4];
				if($adate==$qdate)
				{
					echo"<tr><td>".$date2."</td><td>".$roll."</td></tr></table><center>"; 
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
