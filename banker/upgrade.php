<?php
require_once("config.php");
$material=(int)$_REQUEST['ma'];
$id=(int)$_SESSION['uid'];
$sql="select * from stock where userid=" . $id;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$money=$rs['money'];
	$oven1ava=$rs['oven1'];
	$oven2ava=$rs['oven2'];
	$oven3ava=$rs['oven3'];
	$oven4ava=$rs['oven4'];
	
	}
	echo "<script>alertoven();</script> ";
if($oven4ava==1){
	
	echo "<script>alertoven();</script> ";
}

else if($oven3ava==1){
	$ovenprice=100000;
	if($money>=$ovenprice){
	$ava=1;
	$money-=$ovenprice;
	$sql = "update stock set  oven4 = '$ava',money='$money'  where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}
	
}
else if($oven2ava==1){
	
	$ovenprice=10000;
	if($money>=$ovenprice){
	$ava=1;
	$money-=$ovenprice;
	$sql = "update stock set  oven3 = '$ava',money='$money'  where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}
}
else if($oven1ava==1){
	$ovenprice=1000;
	if($money>=$ovenprice){
	$ava=1;
	$money-=$ovenprice;
	$sql = "update stock set  oven2 = '$ava',money='$money'  where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}
}











?>