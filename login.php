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
	$passWord = $_POST['pwd'];

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
				$_SESSION['get']=0;
				$_SESSION['spent']=0;			
				$_SESSION['um']=0;
				$_SESSION['ug']=0;
				$_SESSION['sell']=0;

				$_SESSION['lv'] = $row['lv'];
				
				header("Location: load.php");
				//echo "<a href='02.list.php'>go</a>";
				exit(0);
			} else {
				echo "Invalid Username or Password - Please try again <br />";
				
			}
}
else{
	$userName = "";
	$passWord = "";
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
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>開心廚房</title>
        <meta charset="UTF-8" />
        <style type="text/css">
            #a {
                height:30px;
                solid #ccc;
                font-family:Microsoft JhengHei;
                font-size:22px;
                text-align:center;
            }
            #b {

                solid #ccc;
                font-family:Microsoft JhengHei;
                font-size:22px;
                text-align:center;
            }
            #c {
                height:30px;
                solid #ccc;
                font-family:Microsoft JhengHei;
                font-size:22px;
                text-align:center;
            }
            #a input {
                width:150px;
                height:20px;
                border:2px solid red;
            }
            #c input {
                width:150px;
                height:20px;
                border:2px  solid red;
                vertical-align:middle;
            }
            #b input {
                width:150px;
                height:20px;
                border:2px solid red;
                vertical-align:middle;
            }
            h1{
              font-family:Microsoft JhengHei;
              color:red;
              text-align:center;
            }            

        </style>
    </head>
    <br /><br /><br /><br /><br /><br />
    <body background="login2.jpg">
        <embed src="login.mp3" autostart="true" hidden="true" loop="1" volume="100"/><br />
        <h1>歡迎來到我的開心廚房</h1>
        <form method="post" action="login.php">
        <div style="text-align:center"><img src="login.gif"><br /></div>
        <div id="c">使用者名字:&nbsp;&nbsp;<input type="text" name="username"></div>
        <div id="a">密碼  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<input type="password" name="pwd"></div>
        <br />
        <div style="text-align:center"><input type="submit" value="登入"></div>
        <div style="text-align:center"><input type="button" value="註冊" onclick="window.location='registerkeyin.php'"></div>
        </form>
    </body>
</html>