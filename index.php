<?php

include ("header.php");
include ("config/config.php");
session_start();

if ($_SESSION['login'])
 getLoggedHead();
else
 getHead();


$conn = getDB();
$sql = "SELECT * FROM images";
foreach ($conn->query($sql) as $key=>$image)
{
    if ($key < $_GET['page'] * 5 && $key >= $_GET['page'] * 5 - 5)
    {
        echo "<img style='display:block; width:100px;' id='base64image'                 
          src='" .  $image['image'] . "' /> <br>";
    }
}

?>

<html>
<body background = "https://wallpapertag.com/wallpaper/full/a/d/8/8613-amazing-dark-background-2560x1600-download-free.jpg" style="background-size: cover;">
<H1 style="color: white; margin: auto; width: 50%;"> Recently uploaded photos</H1>
<font style="color: white" >This is the index. I'm going to put gallery over here.</font>
</body>
<html>
