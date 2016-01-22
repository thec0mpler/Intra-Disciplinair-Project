<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/domoit.css" rel="stylesheet">
<style>
#container {
    margin: 0px auto;
    width: 500px;
    height: 375px;
    border: 10px #333 solid;
}
#videoElement {
    width: 500px;
    height: 375px;
    background-color: #666;
}
var video = document.querySelector("#videoElement");

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

if (navigator.getUserMedia) {
    navigator.getUserMedia({video: true}, handleVideo, videoError);
}

function handleVideo(stream) {
    video.src = window.URL.createObjectURL(stream);
}

function videoError(e) {
    // do something
}

    <title>DomoIT</title>
    </style>
</script>
</head>
<body>

<div id="navigation">
    <a href="index_begeleiders.php" class="back-button active">
        <img src="/assets/images/house-icon.png">
    </a>
    <div class="name">DomoIT</div>
    <a href="opties_begeleiders.php" class="settings-button">
        <img src="/assets/images/settings-icon.png">
    </a>
</div>

<div id="content">
<div class="clearfix"></div>
<body>
<br><br>
<p>Woning "nr. halen uit de database"</p><br><br>
<p class="bewoner_gegevens">
=====================
<table width="450"; border="1">
    <tr>
        <th>Naam bewoner:         </th>
        <th>"naam ophalen:    "</th>
    </tr>
    <tr>
        <th>Leeftijd</th>
        <th>"Leeftijd ophalen"</th>
    </tr>
</table>
<div id="container">
    <video autoplay="true" id="videoElement">

    </video>
</div><br>
========================
<p>                                                         <video width="50%" height="50%" controls poster="/test video & audio/video/Snowball.png"  >
    <source src="/test video & audio/video/Snowball.mp4" type="video/mp4" />
    <source src="/test video & audio/video/Snowball.ogv" type="video/ogg" />
    <source src="/test video & audio/video/Snowball.wbem" type="video/webm" />
    <em>Sorry, your browser doesn't support HTML5 video.</em>
</video>

<form action="logboek.asp">
  <p>Informatie over de bewoner:</p><br>
  <input type="text" name="fname" class="text_log"><br>

  <input type="submit" value="Submit" class="submitted">
</form>
</p>




</body>
</html>

