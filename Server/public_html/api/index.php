<?php
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

// Find IP from raspberry
$stmt = $dbh->prepare("
    SELECT raspberrypi.ip
    FROM gebruiker as gebruiker
    JOIN woning on gebruiker.woning = woning.id
    JOIN raspberrypi on woning.raspberrypi = raspberrypi.id
    WHERE gebruiker.id = " . intval($request->from));
$stmt->execute();

$raspberrypiIp = $stmt->fetchColumn();
$raspberrypiGpioPin = intval($dbh->query("SELECT gpio_pin FROM lamp WHERE id = " . intval($request->light))->fetchColumn());

if (empty($raspberrypiIp))
    response([
        "code" => 404,
        "message" => "Geen Raspberry Pi gevonden."
    ]);

$request->accepted = true;
$request->gpio_pin = $raspberrypiGpioPin;

// Generate URL
$url = "http://" . $raspberrypiIp . "/?json=" . urlencode(json_encode($request));
#$url = "http://" . $raspberrypiIp;

// Send request to Raspberry Pi
$response = intval(file_get_contents($url));

if ($response == 200) {
    if ($request->action == "light/switch") {
        $dbh->query("
            UPDATE lamp
            SET status = " . $request->status . "
            WHERE id = " . $request->light);
    }

    response([
        "code" => 200,
        "message" => "Succesvolle opdracht!"
    ]);
} else {
    response([
        "code" => 500,
        "message" => "Fout bij Raspberry Pi!"
    ]);
}
