<?php
session_start();

include ("config/config.php");
include ("header.php");

getHead();
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
<body background = "https://wallpapertag.com/wallpaper/full/a/d/8/8613-amazing-dark-background-2560x1600-download-free.jpg" style="background-size: cover;">
<div class="center">
<center id="login">
<form action="login.php" method="POST">
<br>
<input style="width: 160px;" type="text" name="login" placeholder="Enter login" required><br>
<br><br><br><br>
<div class="center">
<input id="pw" style="width: 160px;" type="password" name="password" placeholder="Enter password" required><font color="white" face="verdana" size="1">Show password</font><input style="color: white" type="checkbox" onclick="passvis()"><br><br>
</div>
<a href="forgot.php"><font size="1" color="gray">Forgot password?</font></a><br>
<input class="button" type="submit" value="Submit" style="margin-top: 10px;">
</form>
</center>
<div>
</body>
</html>
