<?php
require("config.php");


$userid=(int)$_SESSION['uid'];

$_SESSION['viewstock']=0;
$_SESSION['shop']=0;
$_SESSION['question']=1;

	



$sql="select * from stock where userid=" . $userid;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$LV=$rs['lv'];
	$EXP=$rs['EXP'];
}
$sql="select * from lv where lv=" . $LV;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$tl=$rs['totallv'];
	
}
$nextlvexp=$tl-$EXP;
echo "目前等級:  LV";
echo $LV;

echo '<br>';
if($LV<7){
echo "下一次升級：  ";
echo $nextlvexp;
}
else {
	echo "you are max LV";
}
?>
<table border=1>

<tr><td><input type="image" src="1.jpg" ></td><td>LV1 解鎖</td><td>   </td><td>烤箱2ND</td><td>1000塊</td></tr>
<tr><td><input type="image" src="2.jpg" ></td><td>LV2 解鎖</td><td>   </td><td>烤箱3ND</td><td>10000塊</td></tr>
<tr><td><input type="image" src="3.jpg" ></td><td>LV3 解鎖</td><td>   </td><td>烤箱4ND</td><td>100000塊</td></tr>
<tr><td><input type="image" src="4.jpg" ></td><td>LV4 解鎖</td></tr>
<tr><td><input type="image" src="5.jpg" ></td><td>LV5 解鎖</td></tr>
<tr><td><input type="image" src="6.jpg" ></td><td>LV6 解鎖</td></tr>
<tr><td><input type="image" src="7.jpg" ></td><td>LV7 解鎖</td></tr>

</table>