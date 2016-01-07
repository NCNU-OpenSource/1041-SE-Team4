<?php
require("config.php");
$_SESSION['viewstock']=0;
$_SESSION['shop']=1;
$_SESSION['question']=0;

$userid=(int)$_SESSION['uid'];

for($i=1;$i<8;$i++){
$sql="select price from information where breadid=" . $i;
if ($results=mysqli_query($conn,$sql) ) 
	$rs=mysqli_fetch_array($results);
    $howmuch[$i]=$rs['price'];
}

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
　<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>無標題文件</title>
<style type="text/css">
        .buyb{
            position:absolute;
            left:18%;
            top:33%;
            
            
        }
        #back{
            width:62%;
        }
        #ma{
            position:absolute;
            font-size:2em;
            top:65%;
            left:37.7%;
            height:0.8em;
            width:2.5em;
       }

       #buyit{
            position:absolute;
            font-size:1.6em;
            left:37.6%;
            top:72%;
            
       }
       #up{
           position:absolute;
           left:30%;
           top:94%;
           
            font-size:2em
            
       }
       .sell{
           position:absolute;
           font-size:1.4em;
           top:58%;
           left:52%;
           
       }
      
     
       #sellout{
           position:absolute;
           font-size:1.4em;
           top:102%;
           
          
       }
    </style>
</head>


<body>

<div class="buy">
<img src="shopP.jpg" alt="背景" id="back" class="buyb">
<input type="text" name="ma" id="ma" class="buyb">
<input type="button" onclick="buy(<?php echo $money?>)" value="buy" id="buyit" class="buyb" >
<input type="button" onclick="upgrade()" value="upgrade" id="up" class="buyb">



</div>

<div class="sell">

<span  id="br1"><?php echo " X ".$howmanya[1];?></span><span id="a1" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $howmuch[1]."元X ";?><input type="text"  name="b1" id="b1" value="0" style="width:5em;height:2em;"></span><br><br>
<span  id="br2"><?php echo " X ".$howmanya[2] ;?></span><span id="a2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $howmuch[2]."元X ";?><input type="text"  name="b2" id="b2" value="0" style="width:5em;height:2em;"></span><br><br>
<span  id="br3"><?php echo " X ".$howmanya[3] ;?></span><span id="a3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $howmuch[3]."元X ";?><input type="text"  name="b3" id="b3" value="0" style="width:5em;height:2em;"></span><br><br>
<span  id="br4"><?php echo " X ".$howmanya[4] ;?></span><span id="a4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $howmuch[4]."元X ";?><input type="text"  name="b4" id="b4" value="0" style="width:5em;height:2em;"></span><br><br>
<span  id="br5"><?php echo " X ".$howmanya[5] ;?></span><span id="a5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $howmuch[5]."元X ";?><input type="text"  name="b5" id="b5" value="0" style="width:5em;height:2em;"></span><br><br>
<span  id="br6"><?php echo " X ".$howmanya[6] ;?></span><span id="a6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $howmuch[6]."元X ";?><input type="text"  name="b6" id="b6" value="0" style="width:5em;height:2em;"></span><br><br>
<span  id="br7"><?php echo " X ".$howmanya[7] ;?></span><span id="a7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $howmuch[7]."元X ";?><input type="text"  name="b7" id="b7" value="0" style="width:5em;height:2em;"></span>
<input type="button" onclick="sell()" value="sell" class="sell" id="sellout" >
</div>
<input  type="image"  name="取消"  id="cancel"  img src="X.png"  onClick="home()" value="home" class="buyb">


</body>
</html>