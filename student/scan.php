<?php
session_start();
?>
<style>
a{
	color:white;
}
button, select{
	background-color:#03e9f4;
}

</style>
<script src="html5-qrcode.min.js"></script>

<body style="width:100%;margin-top:50px; ">
<div class="row">
  <div class="col">
 
    <div style="width:500px;" id="reader"></div>
  </div>

  <div class="col" style="padding:30px;color:white">
    <h4>SCAN RESULT</h4>
    <div id="result">Result Here</div>
<form method=post>
<br><br>
<input type=text id="txt"  name="txt">
<input type="submit" name="btnsub">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
	</input>
  <?php
include('header.php');
?>
</form>
 </div>
</div>
<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById('result').innerHTML = '<span class="result"> '+qrCodeMessage+'</span>';
txt.value=qrCodeMessage;
window.location='view.php?txt='+txt.value;

}

function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>
<?php 
if($_POST['btnsub'])
{
 extract($_POST);


echo"<script>window.location='view.php?txt=$txt</script>";
}
?>

