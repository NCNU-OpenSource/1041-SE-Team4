<?php
require("config.php");
$id=1;
$status=0;
$userid=(int)$_SESSION['uid'];

	



$sql="select * from stock where userid=" . $userid;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	for($i=1;$i<8;$i++){
		$howmany=(string)$i;
		$howmany="bread" . $i;
		$howmanya[$i]=$rs[$howmany];
		
	}
}
?>
<table border=1>
<tr><td></td><td>所需等級</td><td>所需時間</td><td>所需材包</td><td>賣取金錢</td><td>賣取經驗</td><td>目前擁有</td></tr>
<?php
for($i=1;$i<8;$i++){
$sql="select * from information where breadid=" . $i;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	
	
	
?>


<tr><td><?php echo  $rs['breadname'];?></td><td><?php echo  $rs['LV'];?></td><td><?php echo  $rs['time'];?></td><td><?php echo  $rs['Material'];?></td><td><?php echo  $rs['price'];?></td><td><?php echo  $rs['exp'];?></td><td><?php echo  $howmanya[$i];?></td></tr>
	


<?php
}



}
?>
</table>