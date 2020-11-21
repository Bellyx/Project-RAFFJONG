<?php
require_once("load.php");
@$time_d 	= $_GET['time_d'];
@$name 		= $_GET['name'];
@$nname 	= $_GET['nname'];
@$ppl 		= $_GET['ppl'];
@$e 		= $_GET['e'];
@$phone     = $_GET['phone'];
@$phone2    = $_GET['phone2'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>RAFFJONG</title>
<link rel="shortcut icon" href="images/favicon.png">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="responsive">
	<?php
	//echo $resultArray[$e];
	?>
	<center><h1 class="color-white" style="padding-top: 20px; padding-bottom: 20px;">สรุปผลการจอง</h1></center>
	<div style="width: 90%; margin: 0 auto; background-color: #FFF; border-radius: 20px; padding-top: 10px; padding-bottom: 10px;">
		<div style="width: 98%; margin: 0 auto; padding: 20px; font-size: 26px;">
		เวลาจอง   : <?=$time_d.".00 น.";?><br>
		ชื่อ - สกุล :  <?=$name;?><br>
		ชื่อเล่น     :  <?=$nname;?><br>
		จำนวนลูกค้า :  <?=$ppl;?><br>
		เบอร์โทรติดต่อ : <?=$phone;?><br>
	    
	</div>
	<div class="center" style="width: 50%; margin: 0 auto; padding: 20px; font-size: 30px;">
				
		โต๊ะที่จอง  <br><font style="font-weight: bold; font-size: 80px;"><?=$e;?></font>
	</div>
	<center><span class="color-red"><br>ฟรี Mixser 2 ขวด</br>กรุณาแคปภาพหน้าจอ เพื่อใช้ยืนยันกับเจ้าหน้าที่</span></center>
		<fieldset class="center submit"><button class=" save button" type="button" onclick="location.href='index.php'">เสร็จสิ้น</button></fieldset>
		
	</div><br>

	</body>
</html>