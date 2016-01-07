
<?php
	require("config.php");
	
	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" rel="stylesheet">  
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css" rel="stylesheet">  
<script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script>  
</head>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">

var bs=new Audio();
bs.src="1.mp3";
var ding=new Audio();
ding.src="ding.mp3";



function myFunction(i,t,p,e,m,o) {
	//setTimeout('alertFunc()', 3000);
	getSecs(t,o);
    setTimeout("update("+ i + "," + p + "," + e + "," + m + "," + o + ")", t);
	
}

function getSecs(t,o) { 
	if(t>=1000){
	var mySecs =t/1000; 
//var mySecs1 = ""+mySecs; //將數字變成文字
	mySecs1=  mySecs+ "秒"; //算出倒數的時間
	if(o==1)
		document.form1.timespent1.value = mySecs; 
	if(o==2)
		document.form1.timespent2.value = mySecs; 
	if(o==3)
		document.form1.timespent3.value = mySecs; 
	if(o==4)
		document.form1.timespent4.value = mySecs; 
	
	t=t-1000;
	setTimeout("getSecs(" + t + "," + o + ")",1000); //每1秒重新執行一次
	}
}


function home(){
	bs.play();
	
	$("#mainDiv").empty();
	$.ajax({
		url: 'abcd.php',
		dataType: 'html',
		type: 'POST',
		
		error: function(xhr) {
			alert(xhr);
			
			},
		success: function(response) {
//			$('#'+DIV).html(response); //set the html content of the object msg
			
			
			
			}
	});
	
}

function alerto() {
  alertify.error("烤箱已滿！!");
}

function alertmoney() {
  alertify.error("金錢不足！!");
}

function alertbreada() {
  alertify.error("麵包不足！!");
}

function alertFunc() {
  alertify.error("已經在烤了啦！!");
}

function alertFuncb() {
  alertify.error("材料包不足!");
}

function alertoven() {
  alertify.alert("此烤箱未擁有!");
}

function alertbread() {
  alertify.alert("等級還未夠能烤這個麵包哦!");
}

function update(i,p,e,m) {
	ding.play();
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

function question() {
	bs.play();
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
	bs.play();
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
bs.play();	
	
ma=$("#ma").val();
var r=/^[0-9]*[1-9][0-9]*$/;
if(r.test(ma)==false){
	alert("請輸入正整數");
}
else{
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
}

function upgrade() {

bs.play();
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
	bs.play();
b1=$("#b1").val();
b2=$("#b2").val();
b3=$("#b3").val();
b4=$("#b4").val();
b5=$("#b5").val();
b6=$("#b6").val();
b7=$("#b7").val();

var r=/^[0-9]*[1-9][0-9]*$/;
if(r.test(b1)==false && r.test(b2)==false && r.test(b4)==false && r.test(b5)==false && r.test(b6)==false && r.test(b7)==false && r.test(b3)==false){
	alert("請輸入正整數");
}

else{
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
<body bgcolor="#f9e6a2">
<body onload="alertify.alert('歡迎來到麵包坊   來烤個麵包吧')"  ">
<audio src="bgm1.mp3" autoplay="true" loop="true" 
hidden="true"></audio> 


<div id='div001'></div>
<div id='abc'></div>
<div id='mainDiv'></div>


</body>
</html>
