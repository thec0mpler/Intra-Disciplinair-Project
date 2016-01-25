<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/domoit.css" rel="stylesheet">

    <title>DomoIT</title>

<script type="text/javascript">
function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
</script>
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

  <h1>Hoofdscherm begeleiders</h1>
<span id="date_time"></span>
    <script type="text/javascript">window.onload = date_time('date_time');</script>

<button class = "index_opties" onclick="location.href='woningselectie.php'" >Selecteer woning</button><br>
<button class = "index_opties" onclick="location.href='meldingen.php'" >Hulpoproepen</button><br>
<button class = "index_opties" onclick="location.href='logboek.php'" >Logboek</button>

</div>

</body>
</html>

