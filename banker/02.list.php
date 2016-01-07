<?php 
  require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" rel="stylesheet">  
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css" rel="stylesheet">  
<script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script>  
<style type="text/css">
        .img{
            position:relative;
            left:2.5em;
            top:3em;
        }
        .lock{
            position:absolute;
            top:33%;
            right:37.5%;
        }
       #img{
            width:80%;
        }
       .breaddr{
           position:absolute;
            top:23%;
            left:13%;
       }
       #usname{
            position:absolute;
            top:20.5%;
            left:18.5%;
           font-size:2em;
        }
        #level{
            position:absolute;
            top:14.5%;
            left:11.7%;
           font-size:4em;
        }
         #gold{
            position:absolute;
            top:17.3%;
            left:50%;
           font-size:1.3em;
        }
         #mat{
            position:absolute;
            top:17.3%;
            left:66%;
           font-size:1.3em;
        }
        #sho{
            position:absolute;
            top:12%;
            left:73%;
        }
        #log{
            position:absolute;
            top:100%;
            left:6.5%;
           
        }
        #view{
            position:absolute;
            top:50%;
            left:8%;
        }
        #ques{
            position:absolute;
            top:75%;
            left:8%;
           
        }
        #ex{
            position:absolute;
            top:15%;
            left:21.5%;
           font-size:1.3em;
        }
        #oven1{
            position:absolute;
            top:40%;
            left:20%;
            width:26.5%;
        }
         #oven2{
            position:absolute;
            top:40%;
            left:47%;
            width:26.5%;
        }
         #oven3{
            position:absolute;
            top:75%;
            left:20%;
            margin-top:5em;
            width:26.5%;
        }
         #oven4{
            position:absolute;
            top:75%;
            left:47%;
            margin-top:5em;
            width:26.5%;
        }
        #time1{
             position:absolute;
            top:67.5%;
            left:29.2%;
        }
         #time2{
             position:absolute;
            top:67.5%;
            left:56.5%;
        }
        #time3{
             position:absolute;
            top:115%;
            left:29.2%;
        }
        #time4{
             position:absolute;
            top:115%;
             left:56.5%;
        }
    </style>
</head>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function AllowDrop(event){
    event.preventDefault();
}
function Drag(event){
    event.dataTransfer.setData("text",event.currentTarget.id);
}
function Drop(event,a){
    event.preventDefault();
    var data=event.dataTransfer.getData("text");
    bake(data,a);
}
function bake(breadid,a) {
	DIV='mainDiv';
	
$.ajax({
		url: 'bake.php',
		dataType: 'html',
		type: 'POST',
		data: { bi: breadid , ovenid: a },
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}

function viewstock() {
	bs.play();
	DIV='mainDiv';
$.ajax({
		url: '01-viewstock.php',
		dataType: 'html',
		type: 'POST',
		
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}
</script>
<body>
<?php
	
	$userid=(int)$_SESSION['uid'];
    $username=$_SESSION['uNAME'];
	//$a=(int)$_REQUEST['a'];
$sql="select * from stock where userid=" . $userid;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$lv=$rs['lv'];
	$EXP=$rs['EXP'];
	$money=$rs['money'];
	$ma=$rs['Material'];
    $oven1lock=$rs['oven1'];
	$oven2lock=$rs['oven2'];
	$oven3lock=$rs['oven3'];
	$oven4lock=$rs['oven4'];
	}
    $sql="select * from lv where lv=" . $lv;
if ($results=mysqli_query($conn,$sql) ) {
    $rs=mysqli_fetch_array($results);
    $tl=$rs['totallv'];
}
$nextlvexp=$tl-$EXP;
	
	
$vs=(int)$_SESSION['viewstock'];
$sh=(int)$_SESSION['shop'];
$qt=(int)$_SESSION['question'];
	if($vs==1)
		echo "<script>viewstock();</script> ";
	if($sh==1)
		echo "<script>shop();</script> ";
	if($qt==1)
		echo "<script>question();</script> ";
	
	$mn=(int)$_SESSION['money'];
	$bd=(int)$_SESSION['bread'];
	$ou=(int)$_SESSION['ovenup'];
	if($mn==1){
		echo "<script>alertmoney();</script> ";
		$_SESSION['money']=0;
	}
	if($bd==1){
		echo "<script>alertbreada();</script> ";
		$_SESSION['bread']=0;
	}
	if($ou==1){
		echo "<script>alerto();</script> ";
		$_SESSION['ovenup']=0;
	}
?>
<div id='abc'>
<img src="B.png" alt="背景" class="img" id="img" >
<a href="login.php" class='abc' id="log"><input  type="image"  name="登出"  id="logout"  img src="logout.png"   style="width:50%;"></a>
<div class="breaddr">
<input type="image" src="1.png" id="1" class="img" draggable="true" ondragstart="Drag(event)"/><input type="image" src="2.png" id="2" class="img" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="3.png" id="3" class="img" draggable="true" ondragstart="Drag(event)"/><input type="image" src="4.png" id="4" class="img" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="5.png" id="5" class="img" draggable="true" ondragstart="Drag(event)"/><input type="image" src="6.png" id="6" class="img" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="7.png" id="7" class="img" draggable="true" ondragstart="Drag(event)"/>
</div>
<div class="lock">
    <?php
    for($i=$lv;$i<7;$i++){
    ?>
    <img src="LOCK.png"   id="8"  style="width:8%;margin-left:11%;">
    <?php }?>
</div>
    <div id='user'>
        <input  type="image"  name="s"  id="sho"  img src="shop.png"  onClick="shop()" ></a><input  type="image"  name="資訊"  id="view"  img src="breads.png"  onClick="viewstock()" >
        <input  type="image"  name="問題"  id="ques"  img src="setting.png"  onClick="question()" >
        <span class="img" id="usname" style="color:yellow;"><?php echo $username; ?></span><span class="img" id="level" style="color:black;"><?php echo $lv; ?></span>
        <span class="img" id="ex" >
        <?php
        if($lv<7){ echo $nextlvexp;}
        else {echo "Max ";} 
        ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        if($lv<7){ 
            echo $tl;
}
        else {
            echo " Max";
} 
        ?>
        </span>
        <span class="img" id="gold" style="color:white;"><?php echo $money; ?></span>
        <span class="img" id="mat" style="color:white;"><?php echo $ma; ?></span>
    </div>
    <div id='bake' >
        <img id="oven1" src="oven.png" ondrop="Drop(event,'1')" ondragover="AllowDrop(event)" class='oven'><img id="oven2" src="oven.png" ondrop="Drop(event,'2')" ondragover="AllowDrop(event)" class='oven'>
         <img id="oven3" src="oven.png" ondrop="Drop(event,'3')" ondragover="AllowDrop(event)" class='oven'><img id="oven4" src="oven.png" ondrop="Drop(event,'4')" ondragover="AllowDrop(event)" class='oven'>
        <?php 
            if($oven2lock==0){
        ?>
        <img src="LOCK.png" class="oven" id="oven2" style="width:8%; margin-left:9%;margin-top:6%;">
            <?php }?>
         <?php
            if($oven3lock==0){
        ?>
        <img src="LOCK.png"  class="oven" id="oven3" style="width:100px;margin-left:9%;margin-top:12%;">
        <?php }?>
         <?php
            if($oven4lock==0){
        ?>
        <img src="LOCK.png"  class="oven" id="oven4" style="width:100px;margin-left:9%;margin-top:12%;">
        <?php }?>
        <form name=form1 class="oventime"><input size=9 name=timespent1 id="time1"><input size=9 name=timespent2 id="time2">
        <input size=9 name=timespent3 id="time3"><input size=9 name=timespent4 id="time4"></form>
    </div>
</div>
<div id='mainDiv' >
</div>
</body>
</html>



