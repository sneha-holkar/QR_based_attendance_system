
<?php
session_start();
include('header.php');
include('../connection.php');
$email=$_SESSION["email"];

$q="select * from facultyregister where email='$email'";
$rs=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($rs))
 extract($a);
?>
<style>
input[type=time]
{
	color:white;
}
</style>
<div class="login-box">
  <h2> Create QR Code</h2>
  <form method=post enctype="multipart/form-data">
     <div class="user-box">
      <input type="text" name="nm" required="" value="<?php echo"$name"?>" >
      <label>Name</label>
    </div>
	<div class="user-box">
	   <select name="year" id="year">
	   <option>Year</option>
	   <option value="1">I year</option>
	   <option value="2">II year</option>
	    </select>  
	</div>	
	 <div class="user-box">
	   <select name="sub" id="sub">
	   <option>Subject</option>
	   <option value="OS">OS</option>
	   <option value="JAVA">JAVA</option>
        <option value="SPM">SPM</option>
		<option value="Python">Python</option>
		<option value="OT">OT</option>
		<option value="ADBMS">ADBMS</option>
	   </select>  
    </div>
    <div class="user-box">
	   <select name="class" id="class">
	   <option>Class</option>
	   <option value="TC">Technocrats</option>
	   <option value="CW">Codeworrior</option>

	   </select>  
    </div>
	<div class="user-box">
      <input type="time" name="time" required="">
      <label>Time</label>
    </div>
    <input type="submit" name="btnsub">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
	</input>
	
  </form>
</div>
<?php

   //end of image uploading
   if(isset($_POST['btnsub']))
     {   
 $date=date("y-m-d");
	extract($_POST);
	$t=strval($time);
 echo $fid;
	$strn=$fid."-".$sub."-".$class."-".$date;
	//end of image uploading
include ("qrcode.php");
// Create object
$qc = new QRCODE();
// Create Text Code
$qc->TEXT($strn);
// Save QR Code
$qc->QRCODE(400,"./qrcode/$strn.png");

      
	  $q="insert into qr values('$strn','$class','$date','$sub','$fid')";
	  mysqli_query($cn,$q);
echo"<script>window.location='show.php?img=$strn'</script>";

	 }
?>