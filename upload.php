<?php

session_start();

include ("header.php");

if (!$_SESSION['login']){
    echo "<meta http-equiv='refresh' content='0;url=login.php' />";
}
else
    getLoggedHead();

?>


<html lang="PR-BR">
<head>
<meta charset="UTF-8">
</head>
<body>
<center>
<video autoplay="true" id="a">ss</video>
</center>
<script type="text/javascript">
 navigator.getUserMedia = navigator.getUserMedia ||navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUsermedia || navigator.oGetUserMedia;
 if(navigator.getUserMedia){
  navigator.getUserMedia({video: true}, handleVideo,videoError);
 }
 function handleVideo(stream){
  document.querySelector('#a').src = window.URL.createObjectURL(stream);
 }
 function videoError(e){
  alert("error");
 }
</script>
</body>
</html>
