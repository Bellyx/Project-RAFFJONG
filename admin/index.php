<?php
require_once("../load.php");
@$time_d 	= $_GET['time_d'];
@$name 		= $_GET['name'];
@$nname 	= $_GET['nname'];
@$ppl 		= $_GET['ppl'];
@$phone     = $_GET['phone'];
@$phone2    = $_GET['phone2'];

$sql_ = select("select * from list where name LIKE '%$_GET[search]%' order by id desc");
	//$chk = $sql_[0];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RAFFJONG</title>
<link rel="shortcut icon" href="../images/favicon.png">
<link href="../css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
	<?php
	//echo $resultArray[$e];
	?>
	<center><h1 class="color-white" style="padding-top: 20px; padding-bottom: 20px;">ระบบจองโต๊ะ RAFFJONG</h1></center>
	<div style="width: 90%; margin: 0 auto; background-color: #FFF; border-radius: 20px; padding: 10px;">
		<form class="table_nav" method="get" action="index.php"><div></div><div class="table_search"><fieldset class="search"><label accesskey="f"><input type="text" name="search" value="<?=$_GET['search'];?>" placeholder="ค้นหา"></label><button type="submit"></button><button type="submit" class="clear_search" tabindex="0" style="cursor: pointer; display: none;">x</button></fieldset></div></form>

<div class="tablebody">
	<fieldset class=" submit"><button class=" save button" type="button" onclick="location.href='index.php'">Refresh</button></fieldset>

	<table class="fullwidth">
<caption>ทั้งหมด <?=count($sql_);?> รายการ</caption>
<thead>
	<tr>
		<th id="c0" class="center">ที่</th>
		<th id="c0" class="center" width="15%">ชื่อ-สกุล</th>
		<th id="c2" class="center">ชื่อเล่น</th>
		<th id="c3" class="center">เวลาเข้าร้าน</th>
		<th id="c4" class="center">จำนวนลูกค้า</th>
		<th id="c5" class="center">ที่นั่ง</th>
		<th id="c6" class="center">เบอร์โทรติดต่อ</th>
		<th id="c7" class="center">วันที่จอง</th>
		<th id="c8"></th></tr>
</thead>
<tbody>
<?php
for($i=0;$i<count($sql_);$i++){
	$data = $sql_[$i];
?>
	<tr id="datatable_244" class="sort">
<th data-text="ชื่อ" id="r244" headers="c0"><?=$i+1;?></th>
<th class ="center" data-text="ชื่อ" id="r244" headers="c0"><?=$data['name'];?></th>

<td class="center" ><?=$data['nname'];?></td>

<td class="center" ><?=$data['time_d'];?>.00 น.</td>
<td class="center" ><?=$data['ppl'];?></td>
<td class="center" ><?=$data['e'];?></td>
<td class="center" ><?=$data['phone'];?></td>
<td class="center" ><?php echo thai_date_and_time($data['t']);?></td>
<td  class="buttons" ><a class="button red" href="index.php?del=<?=$data['id'];?>"><span class=" button_w_text"><span class="mobile">ลบ</span></span></a></td>
</tr>
<?php } ?>
</tbody>

</table></div>
	</div><br>

	</body>
</html>
<?php
if(!empty($_GET['del'])){
	$sql_2 = select("select * from list where id=$data[id]"+ "SELECT * FROM `list2` WHERE 1");
	$mm=$sql_2[0];

	for($r=0;$r<count($mm);$r++){
		$exr = explode(",", $mm['e']);
		echo $exr[$r]."<br>";
		$sql = "DELETE FROM seat WHERE num=$exr[$r] and time_d=$data[time_d]";
		$mysqli->query($sql);
		//delete('seat','num='.$exr['$r'] );
	}

	delete('list',"id= $_GET[del]");
	?>
	<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=index.php">
	<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=stone2.php">
	<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=index.php">
	<?php
}
?>