
<?php
require_once("config.php");
$price=(int)$_REQUEST['price'];
$exp=(int)$_REQUEST['exp'];
$material=(int)$_REQUEST['material'];
$id=(int)$_SESSION['uid'];
$breadid=$_REQUEST['bi'];
$ovenid=(int)$_REQUEST['ovenid'];
$breadid=(string)$breadid;
$breadid="bread" . $breadid;

$sql="select * from stock where userid=" . $id;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$exp+=$rs['EXP'];
	$material=$rs['Material']-$material;
	$bread=$rs[$breadid];
	$bread++;
	$lv=$rs['lv'];
}

if($breadid=="bread1"){
$sql = "update stock set bread1 = '$bread' , EXP = '$exp'  where userid=" . $id;
	mysqli_query($conn,$sql) ;
	if($exp>60000){
	$exp=60000;
	$sql = "update stock set bread1 = '$bread' , EXP = '$exp'  where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}	
	
}

if($breadid=="bread2"){
$sql = "update stock set bread2 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	if($exp>60000){
	$exp=60000;
	$sql = "update stock set bread1 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}	
}

if($breadid=="bread3"){
$sql = "update stock set bread3 = '$bread' , EXP = '$exp'  where userid=" . $id;
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	if($exp>60000){
	$exp=60000;
	$sql = "update stock set bread1 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}	
}

if($breadid=="bread4"){
$sql = "update stock set bread4 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	if($exp>60000){
	$exp=60000;
	$sql = "update stock set bread1 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}	
}

if($breadid=="bread5"){
$sql = "update stock set bread5 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	if($exp>60000){
	$exp=60000;
	$sql = "update stock set bread1 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}	
}

if($breadid=="bread6"){
$sql = "update stock set bread6 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	if($exp>60000){
	$exp=60000;
	$sql = "update stock set bread1 = '$bread' , EXP = '$exp'   where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}	
}

if($breadid=="bread7"){
$sql = "update stock set bread7 = '$bread' , EXP = '$exp'  where userid=" . $id;
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	if($exp>60000){
	$exp=60000;
	$sql = "update stock set bread1 = '$bread' , EXP = '$exp'  where userid=" . $id;
	mysqli_query($conn,$sql) ;
	}	
}
$sql="select * from lv where lv=" . $lv;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$tl=$rs['totallv'];
	
}
if($exp>=$tl)
{
	 
	$lv+=1;
	$sql = "update stock set lv= '$lv'  where userid=" . $id;
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	
}
			if($ovenid==1)
				$_SESSION['oven[1]']=0;
			if($ovenid==2)
				$_SESSION['oven[2]']=0;
			if($ovenid==3)
				$_SESSION['oven[3]']=0;
			if($ovenid==4)
				$_SESSION['oven[4]']=0;
			
			
?>