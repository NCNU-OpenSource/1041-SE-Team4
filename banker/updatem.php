
<?php
require_once("config.php");
$material=(int)$_REQUEST['ma'];
$id=(int)$_SESSION['uid'];



$sql = "update stock set  Material = '$material'  where userid=" . $id;
mysqli_query($conn,$sql) ;


?>