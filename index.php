<?php

include ("header.php");
include ("config/config.php");
session_start();

if (!isset($_GET['page']) || $_GET['page'] == 0)
    echo "<meta http-equiv='refresh' content='3;url=index.php?page=1' />";
if ($_SESSION['login'])
 getLoggedHead();
else
 getHead();



$conn = getDB();
$sql = "SELECT * FROM images";
echo "<H1 style='color: white; margin: auto; width: 50%; text-align:center;'> Gallery 📷</H1>";
echo "<div class='grid-container'>";
foreach ($conn->query($sql) as $key=>$image)
{
    if ($key < $_GET['page'] * 5 && $key >= $_GET['page'] * 5 - 5)
    {
        echo "<div class='grid-item'> <a href='test.php'><img class='photo' id='base64image'                 
          src='" .  $image['image'] . "' /></a></div>";
    }
}
echo "</div>";

?>

<html>
<style>
.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
.photo {
    height: auto;
    width: 100%;
}
</style>
<body background = "https://wallpapertag.com/wallpaper/full/a/d/8/8613-amazing-dark-background-2560x1600-download-free.jpg" style="background-size: cover;">
</body>
<html>
