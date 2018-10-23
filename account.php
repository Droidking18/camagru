<?php
session_start();

include ("header.php");
if (!isset($_SESSION['login']))
	exit ("<meta http-equiv='refresh' content='0;url=signup.php' />");
getLoggedHead();

?>

<body background = "https://wallpapertag.com/wallpaper/full/a/d/8/8613-amazing-dark-background-2560x1600-download-free.jpg" style="background-size: cover;">
<font color="white">

Your email address is: "<?php echo $_SESSION['email']; ?>". <br>
Your login is: "<?php echo $_SESSION['login']; ?>". <br><br>
To change password, enter your old password:
<form action="/action_page.php" method="POST">
    Old password<br>
    <input type="password" name="password" value="password"><br>
</form>

