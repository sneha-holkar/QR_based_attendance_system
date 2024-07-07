<?php
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
</html>


<div class="login-box">
  <h2> Student Registration</h2>
  <form method=post>
     <div class="user-box">
      <input type="text" name="nm" required="" pattern="^[a-zA-Z]+ [a-zA-Z]+$">
      <label>Name</label>
    </div>
	<div class="user-box">
      <input type="number" name="rl" required="" max=126 min=1 >
      <label>Roll Number</label>
    </div>
    <div class="user-box">
      <input type="text" name="em" required=""  pattern="[a-z0-9]+@[a-z]+\.[a-z]{2,3}">
      <label>Email</label>
    </div>
	<div class="user-box">
      <input type="number" name="mob" required="" pattern="\d{10}">
      <label>Contact Number</label>
    </div>
	<div class="user-box">
	   <select name="class">
	   <option>Class</option>
	   <option value=TC>Technocrats</option>
	   <option value=CW>Codeworrior</option>
	   </select>
      
    </div>
	<div class="user-box">
	   <select name="year">
	   <option>Year</option>
	   <option value=1><font color=black>I year</font></option>
	   <option value=2>II year</option>
	   </select>
      
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
	<br><br>
	<div class="register-link">
	 <a href=studregister.php>New User...Create Account</a>
	 </div>
  </form>
</div>
<?php
$date=date("y-m-d");
if(isset($_POST['btnsub']))
{
	
    extract($_POST);
    include("connection.php");
    $q="insert into studregister ( `name`, `rollno`, `email`, `phone`, `class`, `year`, `password`, `date`) VALUES ('$nm','$rl','$em','$mob','$class','$year','$pws','$date')";
    if(mysqli_query($cn,$q))
    echo "<script>alert('Registration Successful');window.location='studlogin.php'</script>";
}

?>