<?php
session_start();
    include("header.php");
	
 ?>

<body>
<div id="abc">
    <nav>
	  <b> <i><font color=white >  QR-Based Attendance System</font></i></b>
        <ul>
            <li><a href="factlogin.php">FACULTY LOG IN</a></li>
            
        </ul>
    </nav>
</div>
</body>



<div class="login-box">
  <h2> Student Login</h2>
  <form method=post>
    <div class="user-box">
      <input type="text" name="em" required="" pattern="[a-z0-9]+@[a-z]+\.[a-z]{2,3}">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="psw" required="">
      <label>Password</label>
    </div>
    <input type="submit" name="btnlg">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
	</input>
	<br><br>
	<br><br>
	<div class="register-link">
	 <a href=studregister.php>New User...Create Account</a>
	 </div>
  </form>
</div>
<?php

if(isset($_POST['btnlg']))
{
	

$e=$_POST['em'];
$pass=$_POST['psw'];
include("connection.php");
$q="select * from studregister where email='$e' and password='$pass'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
	extract($a);
$_SESSION['sid']=$sid;
echo"<script>window.location='student/index.php'</script>";
}
else
echo"<script>alert('Incorrect email or password');</script>";
mysqli_close($cn);
}

?>