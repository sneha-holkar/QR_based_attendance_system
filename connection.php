<?php
$cn=mysqli_connect("localhost","root","","qr_based_attendance_system");
if(!$cn)
{
die.('Could not connect to database:'.mysqli_error());
}

?>