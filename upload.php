<?php

session_start();

include ("header.php");

if (!isset($_SESSION['login'])){
    echo "<meta http-equiv='refresh' content='0;url=login.php' />";
}
else
    getLoggedHead();

?>


<html lang="PR-BR">
<head>
<meta charset="UTF-8">
</head>
<body background = "https://wallpapertag.com/wallpaper/full/a/d/8/8613-amazing-dark-background-2560x1600-download-free.jpg" style="background-size: cover;">
<center>
<video autoplay="true" id="video">Failure</video>
<select id="filter">
    <option value="invert(0%)">NONE</option>
    <option value="sepia(100%)">Sepia</option>
    <option value="grayscale(100%)">Greyscale</option>
    <option value="blur(10px)">Blur</option>
    <option value="invert(100%)">Invert</option>
    <option value="hue-rotate(90deg)">Hue</option>
    <option value="contrast(200%)">Contrast</option>
</select>
<canvas id="canvas" style="display: block;"></canvas>
<div>
    <div id="photos"> </div>
</div>
</center>
<center>
<button id="capture"> capture </button>
<form action="photo.php" method="POST">
<input type="hidden" id="upload" name="photo" value=""required>
<input type="submit">
</form>



<div id="buttonsDiv" >
<input type="file" multiple="false" accept="image/*"  id="files"/>
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
const photoFilter = document.getElementById('filter');


if (window.File && window.FileReader && window.FileList && window.Blob) {
  document.getElementById('files').addEventListener('change', handleFileSelect, false);
} else {
  alert('The File APIs are not fully supported in this browser.');
}

function handleFileSelect(evt) {
  var arr = (document.getElementById('files').value).split(".");
  var ext = arr[arr.length - 1];
  var f = evt.target.files[0];
  var reader = new FileReader();
  reader.onload = (function(theFile) {
    return function(e) {
      var binaryData = e.target.result;
      var base64String = "data:image/" + ext + ";base64," + (window.btoa(binaryData));
      document.getElementById('upload').value = base64String;
    };
  })(f);
  reader.readAsBinaryString(f);
}

navigator.getUserMedia = navigator.getUserMedia ||navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUsermedia || navigator.oGetUserMedia;
if(navigator.getUserMedia){
    navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(function (stream) { video.srcObject = stream; video.play(); })
        .catch(function (err) { console.log(`error: ${$err} `); } )
}


video.addEventListener('canplay', function (e) { if(!streaming) { height = video.videoHeight / (video.videoWidth / width); video.setAttribute('width', width); video.setAttribute('height', height); canvas.setAttribute('width', width); canvas.setAttribute('height', height); streaming = true;}}, false);

photoButton.addEventListener('click', function(e) { takePicture(); e.preventDefault(); } , false);


photoFilter.addEventListener('change', function(e) { 
    filter =  e.target.value;
    video.style.filter = filter;
    //e.PreventDefault();
}
);


function takePicture () { const context = canvas.getContext('2d');  if (width && height) { canvas.width = width; canvas.height = height; } context.drawImage(video, 0, 0, width, height); 

const imgURL = canvas.toDataURL('image/png');

toString(imgURL);
console.log(imgURL);

document.getElementById("upload").value = imgURL;
}



</script>
</body>
</html>
