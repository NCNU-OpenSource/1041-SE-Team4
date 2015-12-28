
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">




function buy() {
	

username=$("#username").val();
pwd=$("#pwd").val();
email=$("#email").val();

$.ajax({
		url: 'register.php',
		dataType: 'html',
		type: 'POST',
		data: { username : username,pwd: pwd, email : email},
		error: function(xhr) {
			alert(xhr);
			window.location.assign("http://localhost/banker/login.php");
			},
		success: function(response) {
//			$('#'+DIV).html(response); //set the html content of the object msg
			
			window.location.assign("http://localhost/banker/login.php");
			
			}
	});
	
}
</script>
<h1>register</h1><hr />
<div id='abc'>
User Name: <input type="text" name="username" id="username"><br />
Password : <input type="password" name="pwd" id="pwd" ><br />
email : <input type="text" name="email" id="email" ><br />
<input type="button" onclick="buy()" value="register">
</div>

<?php

	
$_SESSION['re']=2;





?>
