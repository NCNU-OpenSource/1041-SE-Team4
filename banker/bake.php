<?php
require("config.php");
$id=(int)$_REQUEST['bi'];
$ovenid=(int)$_REQUEST['ovenid'];
$userid=(int)$_SESSION['uid'];




$sql="select * from stock where userid=" . $userid;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$ma=$rs['Material'];
	$oven1ava=$rs['oven1'];
	$oven2ava=$rs['oven2'];
	$oven3ava=$rs['oven3'];
	$oven4ava=$rs['oven4'];
	$LV=$rs['lv'];
}


if($ovenid==1){
	$oven1=$_SESSION['oven[1]'];
	$ovenava=$oven1ava;
}
if($ovenid==2){
	$oven1=$_SESSION['oven[2]'];
	$ovenava=$oven2ava;
}
if($ovenid==3){
	$oven1=$_SESSION['oven[3]'];
	$ovenava=$oven3ava;
}
if($ovenid==4){
	$oven1=$_SESSION['oven[4]'];
	$ovenava=$oven4ava;
}

if($ovenava==1){
	

	if($id<=$LV){
		if($oven1==0 ){
	
	

			$sql="select * from information where breadid=" . $id;
			if ($results=mysqli_query($conn,$sql) ) {
				$rs=mysqli_fetch_array($results);
				$timeout=(int)$rs['timeout'];
				$price=(int)$rs['price'];
				$exp=(int)$rs['exp'];
				$Material=(int)$rs['Material'];
				
	
	
?>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function myFunction(i,t,p,e,m,o) {
	//setTimeout('alertFunc()', 3000);
	getSecs(t,o);
    setTimeout("update("+ i + "," + p + "," + e + "," + m + "," + o + ")", t);
	
}


function alertFunc() {
  alert("已經在烤了啦！!");
}

function alertFuncb() {
  alert("材料包不足!");
}

function alertoven() {
  alert("此烤箱未擁有!");
}

function alertbread() {
  alert("等級還未夠能烤這個麵包哦!");
}

function update(i,p,e,m,o) {
	ding.play();
  	
$.ajax({
		url: '01-update.php',
		dataType: 'html',
		type: 'POST',
		data: { bi: i , price: p , exp: e, material: m ,ovenid:o},
		/*
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
			*/
			error: function(xhr) {
			alert(xhr);
			loadlist();
			},
		success: function(response) {
//			$('#'+DIV).html(response); //set the html content of the object msg
			loadlist();
			}
	});
}

function updatem(ma){
	$.ajax({
		url: 'updatem.php',
		dataType: 'html',
		type: 'POST',
		data: { ma : ma},
		
			error: function(xhr) {
			alert(xhr);
			loadlist();
			},
		success: function(response) {
//			$('#'+DIV).html(response); //set the html content of the object msg
			loadlist();
			}
	});
}


</script>


<?php
				if($ma>=$Material){
					
					$m=$ma-$Material;
					/*
					$ssql = "update stock set  Material = '$m'  where userid=" . $userid;
					mysqli_query($conn,$ssql) ;
					*/
					echo "<script>updatem($m);</script> "; 
					
					if($ovenid==1)
						$_SESSION['oven[1]']=1;
					if($ovenid==2)
						$_SESSION['oven[2]']=1;
					if($ovenid==3)
						$_SESSION['oven[3]']=1;
					if($ovenid==4)
						$_SESSION['oven[4]']=1;
					echo "<script>myFunction($id,$timeout,$price,$exp,$Material,$ovenid);</script> "; 
					
					
					
					
				}
				else{
					echo "<script>alertFuncb();</script> ";
				}

			}
		}

		else{
			echo "<script>alertFunc();</script> ";
		}
		
	}
	else{
		echo "<script>alertbread();</script> ";
	}
	
}
else 
{
	
	echo "<script>alertoven();</script> ";
	
}
?>