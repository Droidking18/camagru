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
<form action="photo.php" method="POST">
<input type="hidden" id="upload" name="photo" value="photo">
<input type="submit">
</form>
<center>
<video autoplay="true" id="video">Failure</video>
<button id="capture"> capture </button>
<canvas id="canvas" style="display: none;"></canvas>
<div>
    <div id="photos"> </div>
</div>
</center>
<script type="text/javascript">
 let width = 500,
     height = 0,
     streaming = false;

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
const photoButton = document.getElementById('capture');

navigator.getUserMedia = navigator.getUserMedia ||navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUsermedia || navigator.oGetUserMedia;
if(navigator.getUserMedia){
    navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(function (stream) { video.srcObject = stream; video.play(); })
        .catch(function (err) { console.log(`error: ${$err} `); } )
}

video.addEventListener('canplay', function (e) { if(!streaming) { height = video.videoHeight / (video.videoWidth / width); video.setAttribute('width', width); video.setAttribute('height', height); canvas.setAttribute('width', width); canvas.setAttribute('height', height); streaming = true;}}, false);

photoButton.addEventListener('click', function(e) { takePicture(); e.preventDefault(); } , false);

function takePicture () { const context = canvas.getContext('2d');  if (width && height) { canvas.width = width; canvas.height = height; } context.drawImage(video, 0, 0, width, height); 

const imgURL = canvas.toDataURL('image/png');

toString(imgURL);
console.log(imgURL);

document.getElementById("upload").value = imgURL;
}

</script>
</body>
</html>
