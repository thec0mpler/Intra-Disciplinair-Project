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
    <a href="opties_begeleiders.php" class="settings-button">
        <img src="/assets/images/settings-icon.png">
    </a>
</div>

<div id="content">
    <div class="clearfix"></div>
<!--==========================================-->



<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>Kies de woning</h1>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <?php
    for ($i=0; $i < 15; $i++) {
        ?>
        <li><a href="woning_1.php">woning 1</a></li>
      <li><a href="woning_2.php">woning 2</a></li>
      <li><a href="woning_3.php">woning 3</a></li>

        <?php
    }
    ?>
    </ul>
  </div>



</div>

</body>

<!--==========================================-->
</div>
</div>

</body>
</html>

