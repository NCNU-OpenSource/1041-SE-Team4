
<?php
require_once("config.php");
$material=(int)$_REQUEST['ma'];
$id=(int)$_SESSION['uid'];
$sql="select * from stock where userid=" . $id;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$money=$rs['money'];
	$ma=$rs['Material'];
	
	}
	
$moneyless=$material*10;
$ma+=$material;
if($moneyless<=$money){
$money-=$moneyless;


$sql = "update stock set  Material = '$ma',money='$money'  where userid=" . $id;
mysqli_query($conn,$sql) ;
}

?>