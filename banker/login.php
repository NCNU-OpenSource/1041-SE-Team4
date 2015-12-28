
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
				$_SESSION['oven[1]']=0;
				$_SESSION['oven[2]']=0;
				$_SESSION['oven[3]']=0;
				$_SESSION['oven[4]']=0;
				$_SESSION['viewstock']=0;
				$_SESSION['shop']=0;
				$_SESSION['question']=0;
				$_SESSION['money']=0;
				$_SESSION['bread']=0;
				$_SESSION['ovenup']=0;
				$_SESSION['lv'] = $row['lv'];
				
				header("Location: load.php");
				//echo "<a href='02.list.php'>go</a>";
				exit(0);
			} else {
				echo "Invalid Username or Password - Please try again <br />";
				
			}
		}


?>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function alertbread() {
  alert("username repeat!");
}
function alertbreads() {
  alert("register success!");
}
function kong() {
  alert("has empty input!");
}
</script>

<?php
if (isset($_SESSION['kong'])){
	if($_SESSION['kong']==1){
	echo "<script>kong();</script> ";
	$_SESSION['kong']=0;
	}

}
else{
	$_SESSION['kong']=0;
}

if (isset($_SESSION['re'])){//看變數是否存在


if($_SESSION['re']==1){
	echo "<script>alertbread();</script> ";
	$_SESSION['re']=0;
}
if($_SESSION['re']==2){
	echo "<script>alertbreads();</script> ";
	$_SESSION['re']=0;
}
}
else
	$_SESSION['re']=0;
?>
<h1>Login Form</h1><hr />
<form method="post" action="login.php">
User Name: <input type="text" name="username"><br />
Password : <input type="password" name="pwd"><br />
Nick : <input type="text" name="nick"><br />
<input type="submit">
<input type="button" value="register" onclick="window.location='registerkeyin.php'">
</form>
