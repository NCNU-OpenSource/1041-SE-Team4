<?php
require_once("config.php");
$b1=(int)$_REQUEST['b1'];
$b2=(int)$_REQUEST['b2'];
$b3=(int)$_REQUEST['b3'];
$b4=(int)$_REQUEST['b4'];
$b5=(int)$_REQUEST['b5'];
$b6=(int)$_REQUEST['b6'];
$b7=(int)$_REQUEST['b7'];
$id=(int)$_SESSION['uid'];
$sql="select * from stock where userid=" . $id;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$money=$rs['money'];
	$bread1=$rs['bread1'];
	$bread2=$rs['bread2'];
	$bread3=$rs['bread3'];
	$bread4=$rs['bread4'];
	$bread5=$rs['bread5'];
	$bread6=$rs['bread6'];
	$bread7=$rs['bread7'];
	
	
	}
	if($bread1>=$b1 &&$bread2>=$b2 &&$bread3>=$b3 &&$bread4>=$b4 &&$bread5>=$b5 &&$bread6>=$b6 &&$bread7>=$b7 ){
	$bread1-=$b1;
	$bread2-=$b2;
	$bread3-=$b3;
	$bread4-=$b4;
	$bread5-=$b5;
	$bread6-=$b6;
	$bread7-=$b7;
	
	$b1m=$b1*15;
	$b2m=$b2*40;
	$b3m=$b3*110;
	$b4m=$b4*250;
	$b5m=$b5*750;
	$b6m=$b6*3000;
	$b7m=$b7*15000;
	$total=$b1m+$b2m+$b3m+$b4m+$b5m+$b6m+$b7m;
	$money=$money+$b1m+$b2m+$b3m+$b4m+$b5m+$b6m+$b7m;
	$sql = "update stock set  bread1='$bread1',bread2='$bread2',bread3='$bread3',bread4='$bread4',bread5='$bread5',bread6='$bread6',bread7='$bread7',money='$money'  where userid=" . $id;
	mysqli_query($conn,$sql) ;
	
	
	$_SESSION['sell']=1;
	$_SESSION['get']=$total;
	}
	else{
		$_SESSION['bread']=1;
	}










?>