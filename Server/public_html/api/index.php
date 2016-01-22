<?php
// var_dump($_GET["json"]);

// Database
$databaseFile = __DIR__ . "/../../database.db";

$dbh = new PDO("sqlite:" . $databaseFile, null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

function response($array) {
    exit(json_encode($array));
}

// Validate $_GET["json"], on error: print error and exit
require_once "./validate.php";

// echo "<pre>";
// var_dump($request);
// echo "</pre>";

// Find IP from raspberry
$stmt = $dbh->prepare("
    SELECT raspberrypi.ip
    FROM gebruiker as gebruiker
    JOIN woning on gebruiker.woning = woning.id
    JOIN raspberrypi on woning.raspberrypi = raspberrypi.id");
$stmt->execute();

$raspberrypiIp = $stmt->fetchColumn();

if (empty($raspberrypiIp))
    response([
        "code" => 404,
        "message" => "Geen Raspberry Pi gevonden."
    ]);

response([
    "code" => 200,
    "message" => "Succesvolle opdracht!"
]);

// Generate URL
#$url = "http://" . $raspberrypiIp . "/api/?" .urlencode($_GET["json"]);
$url = "http://" . $raspberrypiIp;

// Send request to Raspberry Pi
#var_dump(htmlentities(file_get_contents($url)));
