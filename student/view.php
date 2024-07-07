<?php
session_start();
include("../connection.php");
$sid=$_SESSION["sid"];
$txt=$_GET["txt"];
$txtarr=explode("-",$txt);
$fid=$txtarr[0];
$subject=$txtarr[1];

$q="select * from qr where qrid='$txt'";
$rs=mysqli_query($cn,$q);
if(mysqli_num_rows($rs)>0)
{
	 
?>
<style>
body{
	
	  background: linear-gradient(#141e30, #243b55);
	    background-color: #0005;
		color:white;
		margin:auto auto;
}
table{
	margin:auto auto;
}
form{
	float:right;
}
 h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}
option{color:black}
 .user-box input,select {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
 .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.user-box input:focus ~ label,
 .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
  margin:auto auto;
}

form input[type="submit"] {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px;
  margin:auto auto;
}

input[type="submit"]:hover {
  background: #4e8b8d;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #4e8b8d,
              0 0 25px #4e8b8d,
              0 0 50px #4e8b8d,
              0 0 100px #4e8b8d;
}


input[type="submit"] span {
  position: absolute;
  display: block;
}


</style>

<table border=2px style="top-margin:30px">
<br><br><br><br><br>
<tr><th>Subject</th>
<th>Class</th>
<th>Teacher</th>
</tr>	
<?php
$a=mysqli_fetch_array($rs);
extract($a);
$sql="select name from facultyregister where fid=$fid";
$rs1=mysqli_query($cn,$sql);
$a1=mysqli_fetch_array($rs1);
extract($a1);
echo"<tr><td>".$subject."</td><td>".$class."</td><td>".$name."</td></tr><br><br><br><br><br>";
}
?>
<h2>To Submit Attendance of Roll Number</h2>

<?php
include("../connection.php");
//$sq='select * from studregister where email=$em';
$r=mysqli_query($cn,"select rollno,year,class from studregister where sid=$sid");
$a=mysqli_fetch_array($r);
extract($a);
echo"<h1 align=center>".$rollno."-".$class."</h1>";
 echo"<center><form method='post'><div class='form-group'><input type=submit name=btnsub value='click here'><span></span><span></span><span></span><span></span></div></center>";
  if(isset($_POST['btnsub']))
     {  
        $query1="select * from atttendance";
		$result=mysqli_query($cn,$query1);
		if(mysqli_num_rows($result)>0)
		{
			
			while($ar=mysqli_fetch_assoc($result))
			{
				$id=$ar["sid"];
				$facid=$ar["fid"];
				$rn=$ar["rollno"];
				$qr=$ar["qrid"];
				$cl=$ar["class"];
				$yr=$ar["year"];
				$sub=$ar["subject"];
				if($sid==$id && $fid==$facid && $rollno==$rn && $qrid==$qr && $class==$cl && $year==$yr && $subject==$sub)
				{
					echo "<script>alert('You Have Already Submitted Your Attendance');window.location='index.php'</script>";
				}
			}
		}	
		  $query2="insert into atttendance values('$sid','$fid','$rollno','$txt','$class','$year','$subject')";
		  
		 if(mysqli_query($cn,$query2))
		 {   
			 echo "<script>alert('Attendance Submitted Successfully');window.location='index.php'</script>";
		 }
		}
		 
	
?>
