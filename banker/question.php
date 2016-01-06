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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
        .qb{
            position:absolute;
            left:5%;
            top:25%;
            
            margin-top:-600px;
            margin-left:240px;
        }
        #qb{
            width:700px;
        }
        #lv{
            position:absolute;
            
            font-size:50px;
            margin-top:-572px;
            margin-left:710px;
       }

       #nextexp{
            position:absolute;
            
            font-size:50px;
            margin-top:-525px;
            margin-left:780px;
       }

   
    </style>
</head>

<body>
<img src="qB.jpg" alt="背景" class="qb" id="qb">
<input  type="image"  name="取消"  id="cancel"  img src="X.png"  onClick="home()" value="home" class="qb">
<span  id="lv" class="qb"><?php echo $LV; ?></span>
<span  id="nextexp" class="qb">
<?php
if($LV<7){ 
echo $nextlvexp;
}
else {
	echo "Max";
} 
?>
</span>
</table>
</body>

</html>