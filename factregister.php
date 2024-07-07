<?php
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
  <h2> Faculty Registration</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" name="nm" required="" pattern="[a-zA-Z]+ [a-zA-Z]+">
      <label>Name</label>
    </div>
    <div class="user-box">
      <input type="text" name="em" required=""  pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="pws" required="">
      <label>Password</label>
    </div>
	<input type="submit" name="btnsub">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
	</input>
	<br><br>
	<div class="register-link">
	 <a href="factlogin.php">Already Have An Account</a>
	 </div>
  </form>
</div>
<?php
$date=date("y-m-d");
if(isset($_POST['btnsub']))
{
	
    extract($_POST);
    include("connection.php");
    $q="insert into facultyregister ( `name`, `email`, `password`, `date`) VALUES('$nm','$em','$pws','$date')";
    if(mysqli_query($cn,$q))
    echo "<script>alert('Registration Successful');window.location='factlogin.php'</script>";
}

?>