<?php
session_start();
include("../connection.php");
$em=$_SESSION["email"];
include("../connection.php");
echo $em;
//$sq='select * from studregister where email=$em';
$r=mysqli_query($cn,"select * from studregister where email=$em'");
if(mysqli_num_rows($r)>0)
{
 while($a=mysqli_fetch_array($r))
 {
 echo"<input type=button value='Submit attendance of'".$rollno."name=btnsub>";
 }
}
?>