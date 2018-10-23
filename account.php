<?php
session_start();

include ("header.php");
if (!isset($_SESSION['login']))
	exit ("<meta http-equiv='refresh' content='0;url=signup.php' />");
getLoggedHead();

?>
<html>
<head>
<script>
function passvis() {
    var p1 = document.getElementById("password");
    var p2 = document.getElementById("password");
    if (arguments[0] == "0") {
        password2.type = "text";
    } else {
        password2.type = "password";
    }
}
</script>
<body background = "https://wallpapertag.com/wallpaper/full/a/d/8/8613-amazing-dark-background-2560x1600-download-free.jpg" style="background-size: cover;">
<font color="white">

Your email address is: "<?php echo $_SESSION['email']; ?>". <br>
Your login is: "<?php echo $_SESSION['login']; ?>". <br><br>
To change password, enter your old password:<br><br>
<form action="change.php" method="POST">
    Enter your password:<br>
    <input type="password" name="password" id="password"><br>
    Enter your new detail:<br>
    <input type="password" name="detail" id="password2"><br>
    <input type="radio" name="type" value="password" onclick="passvis('1')"> Password
    <input type="radio" name="type" value="email" onclick="passvis('0')"> Email
    <input type="radio" name="type" value="login" onclick="passvis('0')"> Username<br>
    <input type="submit" value="Submit"> 
</form>
</form>
</body>
</html>

