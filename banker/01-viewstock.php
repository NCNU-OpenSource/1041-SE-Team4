<?php
require("config.php");
$id=1;
$status=0;
$userid=(int)$_SESSION['uid'];

$_SESSION['viewstock']=1;
$_SESSION['shop']=0;
$_SESSION['question']=0;



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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
　<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>無標題文件</title>
<style type="text/css">
.stock{
    position:absolute;
    left:18%;
    top:40%;
            
    
}
#stock{
    width:auto;
}
#howmanyb{
    position:absolute;
    font-size:1.5em;
    top:64.5%;
    left:74.5%;
   
}
 </style>
</head>

<body>
<img src="stockP.jpg" alt="背景" class="stock" id="stock">
<input  type="image"  name="取消"  id="cancel"  img src="X.png"  onClick="home()" value="home" class="stock">
<span id="howmanyb" class="stock">
<?php
for($i=1;$i<8;$i++){
$sql="select * from information where breadid=" . $i;
if ($results=mysqli_query($conn,$sql) ) {
$rs=mysqli_fetch_array($results);

?>


<?php echo  $howmanya[$i];echo '<br><br>';?>
	
<?php
}



}
?>

</span>

</body>
</html>