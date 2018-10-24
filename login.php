<?php
session_start();

include ("config/config.php");
include ("header.php");


getHead();
if (isset($_POST['login']) && isset($_POST['password'])) {
	$conn = getDB();
	$sql = "SELECT * FROM users";
	foreach ($conn->query($sql) as $user)
	{
		if ($user["login"] == $_POST['login'])
            if (password_verify($_POST['password'], $user['password'])) {
                if ($_user['emailverify'] == 'Y') {
				    $_SESSION['login'] = $_POST['login'];	
		    		$_SESSION['email'] = $user['email'];	
			    	$_SESSION['passhash'] = $user['password'];
                    exit();
                }    
                else
                    echo "Please verify your account. <a href='emailagain.php?user=" . $user['login'] . "'> Click here to send link again</a>";
			}
			else
				echo "Password Incorrect. <meta http-equiv='refresh' content='3;url=login.php' />";
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
