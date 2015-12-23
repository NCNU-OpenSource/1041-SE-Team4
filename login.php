<?php
session_start();
$host = 'localhost';
$user = 'myid';
$pass = '12345';
$db = 'mydb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫

$_SESSION['uNAME'] = "";
if (isset($_POST['username'])){//看變數是否存在
	$userName = $_POST['username'];
	
}
else
	$userName = "";
if (isset($_POST['pwd'])){
	$passWord = $_POST['pwd'];
}
else
	$passWord = "";


		$sql = "SELECT * FROM user WHERE username = '" . $userName . "' AND password= '" . $passWord . "'";
		if ($result = mysqli_query($conn,$sql)) {
			if ($row=mysqli_fetch_array($result)) {
				$_SESSION['uNAME'] = $row['username'];
				$_SESSION['uid'] = $row['userid'];
				$_SESSION['EXP'] = $row['EXP'];
				$_SESSION['oven1']=0;
				$_SESSION['lv'] = $row['lv'];
				
				header("Location: load.php");
				//echo "<a href='02.list.php'>go</a>";
				exit(0);
			} else {
				echo "Invalid Username or Password - Please try again <br />";
				
			}
		}


?>
<h1>Login Form</h1><hr />
<form method="post" action="login.php">
User Name: <input type="text" name="username"><br />
Password : <input type="password" name="pwd"><br />
Nick : <input type="text" name="nick"><br />
<input type="submit">
<input type="button" value="register" onclick="window.location='register.php'">
</form>