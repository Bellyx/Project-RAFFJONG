<?php
require_once("load.php");
require_once("func.php");

	

@$time_d = $_POST['t'];
@$name   = $_POST['name'];
@$nname  = $_POST['nname'];
@$ppl    = $_POST['ppl'];
@$phone  = $_POST['phone'];
@$phone2 = $_POST['phone2'];


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>RAFF JONG</title>
<link rel="shortcut icon" href="images/favicon.png">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="responsive ">
	<center><h1 class="color-white" style="padding-top: 20px; padding-bottom: 20px;">RAFF JONG<br>
	(RAFF_HANG)</h1></center>
	<div style="width: 90%; margin: 0 auto; background-color: #FFF; border-radius: 20px; padding-top: 10px; padding-bottom: 10px;">
		<?php if(empty($time_d)){?>
			<form method="post"  action="index.php#s2">
				<div class="item">
					<label for="register_fb">เวลาเข้าร้าน</label>
					<div class="radiogroups g-input icon-alarm border">
						<label><input name="t" type="radio" value="18" <?php if($time_d=="00"){ echo "checked";} ?> >&nbsp;18.00 น.</label>
						<label><input name="t" type="radio" value="18" <?php if($time_d=="30"){ echo "checked";} ?> >&nbsp;18.30 น.</label>
						<label><input name="t" type="radio" value="19" <?php if($time_d=="00"){ echo "checked";} ?> >&nbsp;19.00 น.</label>
						<label><input name="t" type="radio" value="19" <?php if($time_d=="30"){ echo "checked";} ?> >&nbsp;19.30 น.</label>		
					</div>
					
				</div>
				<div class="item">
					<label for="register_username">ชื่อ - สกุล</label>
					<span class="g-input icon-user">
						<input type="text" name="name" value="<?=$name;?>" required="">
					</span>
					<div class="comment invalid" id="result_register_username">ใส่ชื่อของลูกค้า</div>
				</div>
				<div class="item">
					<label for="register_username">ชื่อเล่น</label>
					<span class="g-input icon-user">
						<input type="text" name="nname" value="<?=$nname;?>" required="">
					</span>
					<div class="comment invalid" id="result_register_username">ใส่ชื่อของลูกค้า</div>
				</div>
				<div class="item">
					<label for="register_username">จำนวนลูกค้า</label>
					<span class="g-input icon-group">
						<input type="text" name="ppl" value="<?=$ppl;?>" required="">
					</span>
					<div class="comment invalid" id="result_register_username">จำนวนลูกค้าที่มา</div>
				</div>
				
				<div class="item">
					<label for="register_username">เบอร์โทรติดต่อ</label>
					<span class="g-input icon-phone">
						<input type="text" name="phone" value="<?=$phone;?>" required="">
					</span>
					<div class="comment invalid" id="result_register_username">ใส่เบอร์โทรศัพท์ของลูกค้าที่สามารถติดต่อได้</div>
				</div>
				<div class="item">
					<label for="register_username">เบอร์โทรติดต่อสำรอง</label>
					<span class="g-input icon-phone">
						<input type="text" name="phone2" value="<?=$phone2;?>">
					</span>
					<div class="comment invalid" id="result_register_username">กรณีติดต่อไม่ได้ใส่เบอร์โทรศัพท์ของลูกค้า</div>
				</div>
				
				<fieldset class="center submit"><button class="btn btn-success "style="width:29%;" type="submit">บันทึกข้อมูล</button></fieldset>
			
			</form>
		<?php } ?>
			<?php if(!empty($time_d)){?>
				<div style="width: 90%; padding: 20px; font-size: 30px;">
		เวลาจอง   : <?=$time_d.".00 น.";?><br>
		ชื่อ - สกุล :  <?=$name;?><br>
		ชื่อเล่น     :  <?=$nname;?><br>
		จำนวนลูกค้า :  <?=$ppl;?><br>
		เบอร์โทรติดต่อ : <?=$phone;?><br>
	</div>
			<form method="post"  action="save.php">
						<input name="t" type="text" value="<?=$time_d;?>"  hidden="">
						<input type="text" name="name" value="<?=$name;?>"  hidden="">
						<input type="text" name="nname" value="<?=$nname;?>"  hidden="">
						<input type="text" name="ppl" value="<?=$ppl;?>"      hidden="">
						<input type="text" name="phone" value="<?=$$phone;?>"   hidden="">
						<input type="text" name="phone2" value="<?=$$phone2;?>"  hidden="">
					<a name="s2"></a>
					<center><br><h3 class="color-red">เลือกที่นั่ง</h3><img src="images/screen.png" width="90%"></center>
					<p id="pp"></p>
					
					<table class="border center data" width="80%">
						<tr style="height: 80px;">
						<td class="right color-white bg-red" width="7%">แถว A</td>
							<?php
								for ($i=30; $i >=26 ; $i--)
									{ ?>
										<td class="Center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d' ");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/com.png'><br>
												<?=$i;?>
											<?php }else{ ?>
											<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/chair.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label>
										<?php } ?>
										</td>
									<?php
									} ?>
							<td class="light  color-white bg-red" width="7%">แถว A</td>
						</tr>
						<tr style="height: 80px;">
							<td class="right color-white bg-red" width="7%">แถว B</td>
							<?php
								for ($i=25; $i >=21 ; $i--)
									{ ?>
										<td class="center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d'");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/com.png'><br>
												<?=$i;?>
											<?php }else{ ?>
											<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/chair.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label> <?php } ?>
										</td>
									<?php
									} ?>
									<td class="light color-white bg-red" width="7%">แถว B</td>
						</tr>
						<tr style="height: 80px;">
							<td class="right color-white bg-red" width="7%">แถว C</td>
							<?php
								for ($i=20; $i >=16 ; $i--)
									{ ?>
										<td class="center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d'");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/com.png'><br>
												<?=$i;?>
											<?php }else{ ?>
											<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/chair.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label><?php } ?>
										</td>
									<?php
									} ?>
									<td class="light color-white bg-red" width="7%">แถว C</td>
						</tr>
					</table>
					<br>
					<br>
					<table class="border center data" width="80%">
						<tr style="height: 80px;">
							<td class="right color-white bg-red" width="7%">แถว D</td>
							<?php
								for ($i=15; $i >=11 ; $i--)
									{ ?>
										<td class="center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d'");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/com.png'><br>
												<?=$i;?>
											<?php }else{ ?>
											<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/chair.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label> <?php } ?>
										</td>
									<?php
									} ?>
									<td class="light color-white bg-red" width="7%">แถว D</td>
							
						</tr>
						<tr style="height: 80px;">
							<td class="right color-white bg-red" width="7%">แถว E</td>
							<?php
								for ($i=10; $i >=6 ; $i--)
									{ ?>
										<td class="center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d'");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/com.png'><br>
												<?=$i;?>
											<?php }else{ ?>
											<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/chair.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label><?php } ?>
										</td>
									<?php
									} ?>
								<td class="light color-white bg-red" width="7%">แถว E</td>	
						</tr>
						<tr style="height: 80px;">
							<td class="right color-white bg-red" width="7%">แถว F</td>
							<?php
								for ($i=5; $i >=1 ; $i--)
									{ ?>
										<td class="center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d = $time_d ");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/com.png'><br>
												<?=$i;?>
											<?php }else{ ?>
											<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/chair.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label><?php } ?>
										</td>
									<?php
									} ?>
									<td class="light color-white bg-red" width="7%">แถว F</td>
						</tr>
					</table>
					
					<br>
				<fieldset class="center submit"><button class=" save button go" type="button" onclick="location.href='index.php'">ยกเลิก</button> <button class="button save " type="submit">บันทึก</button></fieldset>
		</form>
		<?php } ?>
		
	</div><br>

	</body>
</html>