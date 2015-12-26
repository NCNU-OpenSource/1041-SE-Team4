
<?php
	require("config.php");
	
	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function myFunction(i,t,p,e,m) {
	//setTimeout('alertFunc()', 3000);
     setTimeout("update("+ i + "," + p + "," + e + "," + m + ")", t);
	
}

function alerto() {
  alert("烤箱已滿！!");
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

function update(i,p,e,m) {
	
  	DIV='mainDiv';
$.ajax({
		url: '01-update.php',
		dataType: 'html',
		type: 'POST',
		data: { bi: i , price: p , exp: e, material: m },
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}

function loadlist() {
	DIV='div001';
	
$.ajax({
		url: '02.list.php',
		dataType: 'html',
		type: 'POST',
		//data: { a: a },
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}

function bake(breadid,a) {
	DIV='mainDiv';
$.ajax({
		url: 'bake.php',
		dataType: 'html',
		type: 'POST',
		data: { bi: breadid ,ovenid: a },
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

function question() {
	DIV='mainDiv';
$.ajax({
		url: 'question.php',
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

function shop() {
	DIV='mainDiv';
$.ajax({
		url: 'shop.php',
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

function buy(a) {
	
	
ma=$("#ma").val();
total=ma*10;

if(total>a){
	alert("金錢不足!");
}

$.ajax({
		url: 'updatemm.php',
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

function upgrade() {


$.ajax({
		url: 'upgrade.php',
		dataType: 'html',
		type: 'POST',
		
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

function sell() {
b1=$("#b1").val();
b2=$("#b2").val();
b3=$("#b3").val();
b4=$("#b4").val();
b5=$("#b5").val();
b6=$("#b6").val();
b7=$("#b7").val();

$.ajax({
		url: 'sell.php',
		dataType: 'html',
		type: 'POST',
		data: { b1:b1 ,b2:b2 ,b3:b3 ,b4:b4 ,b5:b5 ,b6:b6 ,b7:b7 },
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
	
	echo "<script>loadlist();</script> ";
	
?>
<body>



<div id='div001'></div>
<div id='abc'></div>
<div id='mainDiv'></div>


</body>
</html>
