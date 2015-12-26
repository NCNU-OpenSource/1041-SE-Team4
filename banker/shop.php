<?php
require("config.php");
$_SESSION['viewstock']=0;
$_SESSION['shop']=1;
$_SESSION['question']=0;

$userid=(int)$_SESSION['uid'];

$sql="select * from stock where userid=" . $userid;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$money=$rs['money'];
	$LV=$rs['lv'];
	$EXP=$rs['EXP'];
	$oven1ava=$rs['oven1'];
	$oven2ava=$rs['oven2'];
	$oven3ava=$rs['oven3'];
	$oven4ava=$rs['oven4'];
	for($i=1;$i<8;$i++){
		$howmany=(string)$i;
		$howmany="bread" . $i;
		$howmanya[$i]=$rs[$howmany];
	}
	
	
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
$ovenprice=1000;
$ovenlv="2ND";
if($oven2ava==1){
	$ovenlv="3ND";
	$ovenprice*=10;
}
if($oven3ava==1){
	$ovenlv="4ND";
	$ovenprice*=10;
}
if($oven4ava==1){
	$ovenprice="";
	$ovenlv="你的烤箱已全部解鎖";
}

?>
<table border=1>

<tr><td>buy</td></tr>
<tr><td>材料包</td><td>10</td><td>money</td><td><input type="text" name="ma" id="ma" ></td></tr>
<tr><td></td><td></td><td></td><td><input type="button" onclick="buy(<?php echo $money?>)" value="buy"></td></tr>
<tr><td>upgrade</td></tr>
<tr><td><input type="image" src="oven.jpg" width="50px" height="50px" ></td><td><?php echo $ovenlv ;?></td><td><?php echo $ovenprice;?></td></tr>
<tr><td></td><td></td><td><input type="button" onclick="upgrade()" value="upgrade"></td></tr>
</table>

<br/>

<table border=1>

<tr><td>sell</td></tr>
<tr><td><input type="image" src="1.jpg" ></td><td>x</td><td><?php echo $howmanya[1] ;?></td><td><input type="text" name="b1" id="b1" ></td></tr>
<tr><td><input type="image" src="2.jpg" ></td><td>x</td><td><?php echo $howmanya[2] ;?></td><td><input type="text" name="b2" id="b2" ></td></tr>
<tr><td><input type="image" src="3.jpg" ></td><td>x</td><td><?php echo $howmanya[3] ;?></td><td><input type="text" name="b3" id="b3" ></td></tr>
<tr><td><input type="image" src="4.jpg" ></td><td>x</td><td><?php echo $howmanya[4] ;?></td><td><input type="text" name="b4" id="b4" ></td></tr>
<tr><td><input type="image" src="5.jpg" ></td><td>x</td><td><?php echo $howmanya[5] ;?></td><td><input type="text" name="b5" id="b5" ></td></tr>
<tr><td><input type="image" src="6.jpg" ></td><td>x</td><td><?php echo $howmanya[6] ;?></td><td><input type="text" name="b6" id="b6" ></td></tr>
<tr><td><input type="image" src="7.jpg" ></td><td>x</td><td><?php echo $howmanya[7] ;?></td><td><input type="text" name="b7" id="b7" ></td></tr>
<tr><td></td><td></td><td></td><td><input type="button" onclick="sell()" value="sell"></td></tr>
</table>
