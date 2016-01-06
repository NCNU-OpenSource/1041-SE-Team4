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
<title>無標題文件</title>
<style type="text/css">
        .shop{
            position:absolute;
            left:5%;
            top:25%;
            
            margin-top:-640px;
            margin-left:240px;
        }
        #back{
            width:800px;
        }
        #ma{
            position:absolute;
            font-size:20px;
            margin-top:-390px;
            margin-left:320px;
            height:20px;
            width:100px;
       }

       #buyit{
            position:absolute;
            font-size:20px;
            margin-top:-390px;
            margin-left:450px;
            
       }
       #up{
           position:absolute;
            font-size:30px;
            margin-top:-270px;
            margin-left:400px;
       }
      #br1{
           position:absolute;
           font-size:20px;
           top:-150px;
           margin-top:-315px;
            margin-left:680px;
          white-space: nowrap;
       }
        #br2{
            position:absolute;
           font-size:20px;
           top:-150px;
           margin-top:-260px;
            margin-left:680px;
          white-space: nowrap;
       }
        #br3{
           position:absolute;
           font-size:20px;
           top:-150px;
           margin-top:-205px;
            margin-left:680px;
          white-space: nowrap;
       }
        #br4{
            position:absolute;
           font-size:20px;
           top:-150px;
           margin-top:-155px;
            margin-left:680px;
          white-space: nowrap;
       }
        #br5{
            position:absolute;
           font-size:20px;
           top:-150px;
           margin-top:-105px;
            margin-left:680px;
          white-space: nowrap;
       }
        #br6{
            position:absolute;
           font-size:20px;
           top:-150px;
           margin-top:-50px;
            margin-left:680px;
          white-space: nowrap;
       }
        #br7{
            position:absolute;
           font-size:20px;
           top:-150px;
           margin-top:5px;
            margin-left:680px;
          white-space: nowrap;
       }
       #a1{
           position:absolute;
           font-size:25px;
           top:-150px;
           margin-top:-315px;
            margin-left:850px;
          white-space: nowrap;
         
       }
       #a2{
            position:absolute;
           font-size:25px;
           top:-150px;
           margin-top:-260px;
            margin-left:850px;
          white-space: nowrap;
         
       }
       #a3{
           position:absolute;
           font-size:25px;
           top:-150px;
           margin-top:-205px;
            margin-left:850px;
          white-space: nowrap;
          
       }
       #a4{
            position:absolute;
           font-size:25px;
           top:-150px;
           margin-top:-155px;
            margin-left:850px;
          white-space: nowrap;
       }
       #a5{
           position:absolute;
           font-size:25px;
           top:-150px;
           margin-top:-105px;
            margin-left:850px;
          white-space: nowrap;
       }
       #a6{
            position:absolute;
           font-size:25px;
           top:-150px;
           margin-top:-50px;
            margin-left:850px;
          white-space: nowrap;
       }
       #a7{
            position:absolute;
           font-size:25px;
           top:-150px;
           margin-top:5px;
            margin-left:850px;
          white-space: nowrap;
       }
       #sellout{
           position:absolute;
           font-size:25px;
           top:-150px;
           margin-top:50px;
            margin-left:900px;
          
       }
    </style>
</head>


<body>

<div class="buy">
<img src="shopP.jpg" alt="背景" id="back" class="shop">
<input type="text" name="ma" id="ma" class="shop">
<input type="button" onclick="buy(<?php echo $money?>)" value="buy" id="buyit" class="shop" >
<input type="button" onclick="upgrade()" value="upgrade" id="up" class="shop">



</div>

<div class="sell">

<span class="sell" id="br1"><?php echo " X ".$howmanya[1];?></span><span id="a1"><?php echo $howmuch[1]."元X ";?><input type="text" class="sell" name="b1" id="b1" value="0" style="width:60px;height:25px;"></span>
<span class="sell" id="br2"><?php echo " X ".$howmanya[2] ;?></span><span id="a2"><?php echo $howmuch[2]."元X ";?><input type="text" class="sell" name="b2" id="b2" value="0" style="width:60px;height:25px;"></span>
<span class="sell" id="br3"><?php echo " X ".$howmanya[3] ;?></span><span id="a3"><?php echo $howmuch[3]."元X ";?><input type="text" class="sell" name="b3" id="b3" value="0" style="width:60px;height:25px;"></span>
<span class="sell" id="br4"><?php echo " X ".$howmanya[4] ;?></span><span id="a4"><?php echo $howmuch[4]."元X ";?><input type="text" class="sell" name="b4" id="b4" value="0" style="width:60px;height:25px;"></span>
<span class="sell" id="br5"><?php echo " X ".$howmanya[5] ;?></span><span id="a5"><?php echo $howmuch[5]."元X ";?><input type="text" class="sell" name="b5" id="b5" value="0" style="width:60px;height:25px;"></span>
<span class="sell" id="br6"><?php echo " X ".$howmanya[6] ;?></span><span id="a6"><?php echo $howmuch[6]."元X ";?><input type="text" class="sell" name="b6" id="b6" value="0" style="width:60px;height:25px;"></span>
<span class="sell" id="br7"><?php echo " X ".$howmanya[7] ;?></span><span id="a7"><?php echo $howmuch[7]."元X ";?><input type="text" class="sell" name="b7" id="b7" value="0" style="width:60px;height:25px;"></span>
<input type="button" onclick="sell()" value="sell" class="sell" id="sellout" >
</div>
<input  type="image"  name="取消"  id="cancel"  img src="X.png"  onClick="home()" value="home" class="shop">


</body>
</html>