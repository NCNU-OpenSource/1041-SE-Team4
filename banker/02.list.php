
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
        .img{
            position:relative;
            left:5%;
            top:25%;
            width:1000px;
            border:solid;
        }
        #exp{
            position:absolute;
            top:14%;
            left:8%;
            
        }
        #name{
            position:absolute;
            top:36%;
            left:19%;
            width:180px;
        }
        #money{
            position:absolute;
            
            top:23%;
            left:39%;
            
        }
        #money-line{
            position:absolute;
            
            top:30%;
            left:45%;
            width:140px;
        }
        #material{
            position:absolute;
            top:25%;
            left:55%;
            
        }
        #material-line{
            position:absolute;
            
            top:30%;
            left:61%;
            width:140px;
        }
        .shop{
            position:absolute;
            top:25%;
            left:71%;
           
        }
        .view{
            position:absolute;
            top:60%;
            left:8%;
           
        }
        .ques{
            position:absolute;
            top:85%;
            left:8%;
           
        }
        
        #oven1{
            position:absolute;
            top:48%;
            left:20%;
            width:360px;
            
            
            
        }
         #oven2{
            position:absolute;
            top:48%;
            left:47%;
            width:360px;
            
            
            
        }
         #oven3{
            position:absolute;
            top:78%;
            left:20%;
            margin-top:5em;
            width:360px;
            
            
            
        }
         #oven4{
            position:absolute;
            top:78%;
            left:47%;
            margin-top:5em;
            width:360px;
            
            
            
        }
        #mainDiv{
            position:absolute;
            margin-top:10px;
            
            
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
	/*
    event.currentTarget.appendChild(document.getElementById(data));
	alert(dd);
	*/
	
	
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
	require("config.php");
	$userid=(int)$_SESSION['uid'];
	//$a=(int)$_REQUEST['a'];
$sql="select * from stock where userid=" . $userid;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$lv=$rs['lv'];
	$EXP=$rs['EXP'];
	$money=$rs['money'];
	$ma=$rs['Material'];
	}
	$sql="select * from lv where lv=" . $lv;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$tl=$rs['totallv'];
	
}
	
	echo 	$_SESSION['uNAME'] ;
	
	echo "等級：";
	echo $lv;
	
	echo "   金錢:";
	echo $money;
	echo "   材料包";
	echo $ma;
	echo "目前EXP： ";
	echo $EXP;
	echo "下一級EXP： ";
	echo $tl;
	echo '<br>';
	
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
	
	$spent=$_SESSION['spent'];
	$get=$_SESSION['get'];
	if($_SESSION['um']==1){
		echo "<script>spent($spent);</script> ";
		$_SESSION['um']=0;
		$_SESSION['spent']=0;
	}
	if($_SESSION['ug']==1){
		echo "<script>spent($spent);</script> ";
		$_SESSION['ug']=0;
		$_SESSION['spent']=0;
	}
	if($_SESSION['sell']==1){
		echo "<script>get($get);</script> ";
		$_SESSION['sell']=0;
		$_SESSION['get']=0;
	}
	
?>


<button onclick="viewstock()">viewstock</button>
<button onclick="question()">question</button>
<button onclick="logout()">logout</button>
<input type="button" onclick="home()" value="home">
<br/>
<form name=form1><input size=9 name=timespent1><input size=9 name=timespent2><input size=9 name=timespent3><input size=9 name=timespent4></form>

<input type="image" src="1.jpg" id="1" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="2.jpg" id="2" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="3.jpg" id="3" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="4.jpg" id="4" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="5.jpg" id="5" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="6.jpg" id="6" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="7.jpg" id="7" draggable="true" ondragstart="Drag(event)"/>
<div id='abc'>
<img src="back.jpg" alt="背景" class="img" >
    <div id='user'>
        <img id="exp" src="EXP.png" alt="經驗"  >
        <img id="money" src="money.png" alt="金錢"  >
        <img id="material" src="material.png" alt="材料包"  >
        <img id="name" src="line.png" alt="長條"  >
        <img id="money-line" src="line.png" alt="長條"  >
        <img id="material-line" src="line.png" alt="長條"  >
        <button onclick="shop()" class="shop"><img src="shop.png" class="shop"></button>
        <button onclick="viewstock()" class="view"><img src="breads.png" class="view"></button>
        <button onclick="question()" class="ques"><img src="setting.png" class="ques"></button>
    </div>
    <div id='bake' >
        <img id="oven1" src="oven.png" ondrop="Drop(event,'1')" ondragover="AllowDrop(event)" class='oven'>
        <img id="oven2" src="oven.png" ondrop="Drop(event,'2')" ondragover="AllowDrop(event)" class='oven'>
        <img id="oven3" src="oven.png" ondrop="Drop(event,'3')" ondragover="AllowDrop(event)" class='oven'>
        <img id="oven4" src="oven.png" ondrop="Drop(event,'4')" ondragover="AllowDrop(event)" class='oven'>
    </div>
    
</div>
<div id='mainDiv' >
</div>
<hr>
</body>
</html>



