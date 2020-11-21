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
	<center><h1 class="color-white" style="padding-top: 20px; padding-bottom: 20px;">บ้านสวนลุงบ๊อบ<br>
	</h1></center>
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
					<label for="phone">เบอร์โทรติดต่อ</label>
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
						<input type="text" name="t" value="<?=$time_d;?>"  hidden="">
						<input type="text" name="name" value="<?=$name;?>"  hidden="">
						<input type="text" name="nname" value="<?=$nname;?>"  hidden="">
						<input type="text" name="ppl" value="<?=$ppl;?>"      hidden="">
						<input type="text" name="phone" value="<?=$$phone;?>"   hidden="">
						<input type="text" name="phone2" value="<?=$$phone2;?>"  hidden="">
						<a name="s2"></a>
					<center><br><h3 class="color-red">กรุณาเลือกโต๊ะ</h3><img src="images/stage.png" width="50%"></center>
					<p id="pp"></p>

					<!-- Zone vip 1 -->
					<table class="border center data" width="80%">
						<tr style="height: 100px;">
						<td class="right color-white bg-red" width="7%">Zone VIP</td>
							<?php
								for ($i=6; $i >=4 ; $i--)
									{ ?>
										<td class="Center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d' ");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/success_vip.png'><br>
												<?=$i;?>
											<?php }else{ ?>
											<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/table_vip.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select_vip.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label>
									
										<?php } ?>
										</td>
										<?php
									} ?>

								<td class="center color-white bg-gray" width="7%">ทางเดิน</td>

								<!-- Zone vip 2 -->
								<?php
								for ($i=3; $i >=1 ; $i--)
									{ ?>
										<td class="Center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d' ");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/success_vip.png'><br>
												<?=$i;?>
											<?php }else{ ?>
											<label>
											<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/table_vip.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/Select_vip.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label>
									


										<?php } ?>
										</td>
										<?php
									} ?>

							<td class="light  color-white bg-red" width="7%">Zone VIP</td>
						</tr>
				</table>

			<!---------------------------------------------- ทางเดิน ---------------------------------------------------->					
					<table class="border center data" width="80%"  >
						<tr style="height: 0px;"></tr>
						<td class="center color-white bg-green" width="7%">COUTER BAR</td>
						<td class="center color-white bg-gray" width="18%"></td>
						<td class="center color-white bg-green" width="7%">COUTER BAR</td>
					</table>
					<table class="border center data" width="80%"  >
						<tr style="height: 0px;"></tr>
						<td class="center color-white bg-gray" width="20%">ทางเดิน</td>
					</table>
			<!---------------------------------------------------------------------------------------------------------->

				

			<!--------------------------------------------- Zone A1 ---------------------------------------------------->
					<table class="border center data" width="80%">
						<tr style="height: 80px;">
							<td class="center color-white bg-orange" width="7%">Zone A</td>
							<?php
								for ($i=13; $i >=7 ; $i--)
									{ ?>
										<td class="center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d'");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/success.png'><br>
												<?=$i;?>
											<?php }else{ ?>
												<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/table.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label>
											
											 <?php } ?>
										</td>
									<?php
									} ?>

							<td class="center  color-white bg-orange" width="7%">Zone A</td>
							<td class="center color-white bg-gray" width="4%"></td>
						</tr>
			<!---------------------------------------------------------------------------------------------------------->


			<!---------------------------------------------- Zone A2 --------------------------------------------------->
						<tr style="height: 80px;">
							<td class="center color-white bg-orange" width="7%">Zone A</td>
							<?php
								for ($i=20; $i >=14 ; $i--)
									{ ?>
										<td class="center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d'");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/success.png'><br>
												<?=$i;?>
											<?php }else{ ?>
												<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/table.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label>
											
											 <?php } ?>
										</td>
									<?php
									} ?>
									<td class="center color-white bg-orange" width="7%">Zone A</td>
									<td class="center color-white bg-blue" width="4%"><span class="g-input icon-user"></td>
									<td class="center color-white bg-blue" width="4%">ห้องน้ำ</td>
						</tr>
					

			<!---------------------------------------------------------------------------------------------------------->


			<!---------------------------------------------- Zone A3 --------------------------------------------------->
			<tr style="height: 80px;">
							<td class="center color-white bg-orange" width="7%">Zone A</td>
							<?php
								for ($i=27; $i >=21 ; $i--)
									{ ?>
										<td class="center">
											<?php
											$sql_ = select("select * from seat where num='$i' and time_d ='$time_d'");
											$chk = $sql_[0];
											if(count($sql_)>0){ ?>
												<img src='images/success.png'><br>
												<?=$i;?>
											<?php }else{ ?>
												<label>
												<img onclick="img('1','<?=$i;?>');" id="<?=$i;?>c" src="images/table.png">
												<img onclick="img('0','<?=$i;?>');" id="<?=$i;?>s" src="images/select.png" style="display: none;"><br>
												<input name="e[]" type="checkbox" value="<?=$i;?>" hidden="" ><?=$i;?>
											</label>
											
											 <?php } ?>
										</td>
									<?php
									} ?>
									<td class="center color-white bg-orange" width="7%">Zone A</td>
									<td class="center color-white bg-blue" width="4%"><span class="g-input icon-user"></td>
									<td class="center color-white bg-blue" width="4%">ห้องน้ำ</td>
						</tr>
						

			</table>
			<!---------------------------------------------------------------------------------------------------------->


			<!---------------------------------------------- ทางเดิน ---------------------------------------------------->					
					<table class="border center data" width="80%"  >
						<tr style="height: 0px;"></tr>
						<td class="center color-white bg-green" width="7%">COUTER BAR</td>
						<td class="center color-white bg-gray" width="18%"></td>
						<td class="center color-white bg-green" width="7%">COUTER BAR</td>
					</table>
					<table class="border center data" width="80%"  >
						<tr style="height: 0px;"></tr>
						<td class="center color-white bg-gray" width="20%">ทางเดิน</td>
					</table>
			<!---------------------------------------------------------------------------------------------------------->











					<br>
					<br>
					
						</tr>
					</table>
					
					<br>
				<fieldset class="center submit"><button class=" save button go" type="button" onclick="location.href='index.php'">ยกเลิก</button> <button class="button save " type="submit">บันทึก</button></fieldset>
		</form>
		<?php } ?>
		
	</div><br>

	</body>
</html>