<?php
session_start();

include ("config/config.php");

if (isset($_POST['login']) && isset($_POST['password'])) {
	$lol = getDB();
	$sql = "SELECT * FROM users";
	foreach ($lol->query($sql) as $user)
	{
		if ($user['login'] == $_POST['login'])
			echo $user['login'] . "|". $_POST['login'] . "|";
	}
	exit();
}
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/login.css">
<script> 
function passvis() {
    var x = document.getElementById("pw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</head>
<body background = "https://i.imgur.com/vIrpsIi.gif" style="background-size: cover;">
<div class="center">
<center id="login">
<form action="login.php" method="POST">
Login:<br>
<input class="text" style="width: 160px;" type="text" name="login" placeholder="Enter login" required><br><br><br>
Password:<br><br>
<div class="center">
<input id="pw" class="text" style="width: 160px;" type="password" name="password" placeholder="Enter password" required><font color="white" face="verdana" size="1">Show password</font><input style="color: white" type="checkbox" onclick="passvis()"><br><br><br>
</div>
Email:<br>
<input class="text" style="width: 160px;" type="text" name="email" placeholder="Enter email" required><br><br>
<input class="button" type="submit" value="Submit">
</form>
</center>
<div>
</body>
</html>
