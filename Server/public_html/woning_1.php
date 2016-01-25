<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/domoit.css" rel="stylesheet">

    <title>DomoIT</title>

</head>
<body>

<div id="navigation">
    <a href="index_begeleiders.php" class="back-button active">
        <img src="/assets/images/house-icon.png">
    </a>
    <div class="name">DomoIT</div>
</div>
<div id="content">
<div class="clearfix"></div>
<body>
<br><br>
<p>Woning "nr. halen uit de database"</p><br><br>
<p class="bewoner_gegevens">

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
<br>

<p>
                                                      <video width="50%" height="50%" controls poster="/test video & audio/video/Snowball.png"  >
    <source src="/test video & audio/video/Snowball.mp4" type="video/mp4" />
    <source src="/test video & audio/video/Snowball.ogv" type="video/ogg" />
    <source src="/test video & audio/video/Snowball.wbem" type="video/webm" />
    <em>Sorry, your browser doesn't support HTML5 video.</em>
</video>

<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";
?>

<form action="#" method="post">
  <p>Informatie over de bewoner:</p><br>
  <input type="text" name="fname" class="text_log"><br>
  <input type="submit" value="Submit" class="submitted">
</form>




</p>




</body>
</html>

