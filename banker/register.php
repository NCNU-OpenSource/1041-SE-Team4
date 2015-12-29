<?php

session_start();
$host = 'localhost';
$user = 'myid';
$pass = '12345';
$db = 'mydb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫

$un=(string)$_REQUEST['username'];
$pwd=(string)$_REQUEST['pwd'];
$em=(string)$_REQUEST['email'];

echo $un;
echo $pwd;
echo $em;
for($i=1;$i<=50;$i++){
	$sql="select * from user where userid=" . $i;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
	$username=(string)$rs['username'];
	$aaa=strcmp($un,$username);
	if($aaa==0){
		$abc=1;
	}
}
}
if($un=="" || $pwd=="" || $em==""){
	$_SESSION['kong']=1;
}
else{
	if($abc==1){
		$_SESSION['re']=1;
	}
	else{
	
		$sql = "insert into user (username, password, email) values ('$un', '$pwd','$em');";
		
		mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
		
		$sql = "insert into stock (user) values ('$un');";
		
		mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
		$_SESSION['re']=2;
	}

}

?>