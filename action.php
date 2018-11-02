<?php

session_start();
include("header.php");
include ("config/config.php");

if (!isset($_SESSION['login']))
	exit ("Log in to like or comment. <meta http-equiv='refresh' content='0;url=index.php' />");	
else
	getLoggedHead();
$conn = getDB();
$sql = "SELECT * FROM images WHERE id='" . $_GET['id'] . "';";
 foreach ($conn->query($sql) as $key=>$image)
 {
	 echo "<img style='display:block; width:40%; margin: auto;' id='base64image' src='" . $image['image'] . "'/><div style='text-align: center; color: white;'>";
	echo "This photo was uploaded by " . $image['login'] . ".<br>"; 
	if (unserialize($image['comments']) == NULL)
		 echo "There are no comments yet.<br>";
	else
		 print_r(unserialize($image['comments']));
	if (unserialize($image['likes']) == NULL)
		 echo "There are no likes yet.<br>";
	else
		print_r(unserialize($image['likes']));
	echo "</div>";


}

?>

<html>
<body background = "https://wallpapertag.com/wallpaper/full/a/d/8/8613-amazing-dark-background-2560x1600-download-free.jpg" style="background-size: cover;">
</body>
</html>
