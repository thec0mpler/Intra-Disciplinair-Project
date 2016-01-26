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

$gebruiker = 1;
$woning = 1;
?><!DOCTYPE html>
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
    <a href="index.php" class="back-button active">
        <img src="/assets/images/house-icon.png">
    </a>
    <div class="name">DomoIT</div>
    <a href="opties.php" class="settings-button">
        <img src="/assets/images/settings-icon.png">
    </a>
</div>

<div id="content">
    <div class="clearfix"></div>
