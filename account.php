<?php
session_start();

include ("header.php");
if (!isset($_SESSION['login']))
	exit ("<meta http-equiv='refresh' content='0;url=signup.php' />");
getLoggedHead();

?>

<body background = "https://wallpapertag.com/wallpaper/full/a/d/8/8613-amazing-dark-background-2560x1600-download-free.jpg" style="background-size: cover;">
