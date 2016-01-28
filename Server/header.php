<?php
// Database
$databaseFile = __DIR__ . "/database.db";

$dbh = new PDO("sqlite:" . $databaseFile, null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

function dump($string) {
    echo "<pre>";
    var_dump($string);
    echo "</pre>";
}

if (!isset($begeleider) || !is_bool($begeleider)) {
    $begeleider = false;
}

$gebruiker = $woning = 1;
?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/domoit.css" rel="stylesheet">

    <title>DomoIT</title>
</head>
<body>

<div id="navigation">
    <a href="javascript:this.location='/<?php echo ($begeleider ? "begeleider/" : ""); ?>index.php'" class="back-button active">
        <img src="/assets/images/house-icon.png">
    </a>
    <div class="name">DomoIT</div>
    <a href="javascript:this.location='/<?php echo ($begeleider ? "begeleider/" : ""); ?>login.php'" class="settings-button">
        <img src="/assets/images/settings-icon.png">
    </a>
</div>

<div id="content">
    <div class="clearfix"></div>
