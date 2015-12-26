
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
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
	
	$money=$rs['money'];
	$ma=$rs['Material'];
	}
	echo "等級：";
	echo $lv;
	
	echo "   金錢:";
	echo $money;
	echo "   材料包";
	echo $ma;
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
	
?>


<button onclick="viewstock()">viewstock</button>
<button onclick="question()">question</button>
<button onclick="shop()">shop</button>
<br/>
<input type="image" src="1.jpg" id="1" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="2.jpg" id="2" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="3.jpg" id="3" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="4.jpg" id="4" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="5.jpg" id="5" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="6.jpg" id="6" draggable="true" ondragstart="Drag(event)"/>
<input type="image" src="7.jpg" id="7" draggable="true" ondragstart="Drag(event)"/>
<div id='abc'>
<img id="oven1" src="oven.jpg" ondrop="Drop(event,'1')" ondragover="AllowDrop(event)">
<img id="oven2" src="oven.jpg" ondrop="Drop(event,'2')" ondragover="AllowDrop(event)">
<img id="oven3" src="oven.jpg" ondrop="Drop(event,'3')" ondragover="AllowDrop(event)">
<img id="oven4" src="oven.jpg" ondrop="Drop(event,'4')" ondragover="AllowDrop(event)">
</div>
</div>
<hr>
</body>
</html>


