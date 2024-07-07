<?php
    session_start();
    include("header.php");
 ?>
<body>
<div id="abc">
    <nav>
	  <b> <i><font color=white >  QR-Based Attendance System</font></i></b>
        <ul>
            <li><a href="studlogin.php">STUDENT LOG IN</a></li>
            
        </ul>
    </nav>
</div>
</body>
</html>


<div class="login-box">
  <h2> Faculty Login</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" name="em" required="" pattern="[a-z0-9]+@[a-z]+\.[a-z]{2,3}">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="pws" required="">
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
	 <a href=factregister.php>New User...Create Account</a>
	 </div>
  </form>
</div>

<?php

if(isset($_POST['btnlg']))
{
	

$e=$_POST['em'];
$pass=$_POST['pws'];
include("connection.php");
$q="select * from facultyregister where email='$e' and password='$pass'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
$_SESSION['email']=$e;
echo"<script>window.location='faculty/index.php'</script>";
}
else
echo"<script>alert('Incorrect email or password');</script>";
mysqli_close($cn);
}

?>