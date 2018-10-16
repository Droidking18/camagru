<?php
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
	echo $_POST['login'] . "\n" . $_POST['password'];
	die();
}
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body background = "https://i.imgur.com/vIrpsIi.gif">
<div class="center">
<center id="login">
<form action="login.php" method="POST">
Login:<br>
<input class="text" style="width: 160px;" type="text" name="login" placeholder="Enter login" required><br>
Password:<br>
<input class="text" style="width: 160px;" type="password" name="password" placeholder="Enter password" required><br><br>
<input class="button" type="submit" value="Submit">
</form>
</center>
<div>
</body>
</html>


