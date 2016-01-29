<?php
// Database
$databaseFile = __DIR__ . "/../../database.db";

$dbh = new PDO("sqlite:" . $databaseFile, null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

function response($array) {
    echo json_encode($array);
    exit();
}

// Validate $_GET["json"], on error: print error and exit
require_once "./validate.php";

if (in_array($request->action, [
    "light/switch",
    "camera/switch"
    ])) {
    // Find IP from raspberry
    $stmt = $dbh->prepare("
        SELECT raspberrypi.ip
        FROM gebruiker as gebruiker
        JOIN woning on gebruiker.woning = woning.id
        JOIN raspberrypi on woning.raspberrypi = raspberrypi.id
        WHERE gebruiker.id = " . intval($request->from));
    $stmt->execute();

    $raspberrypiIp = $stmt->fetchColumn();

    if (empty($raspberrypiIp))
        response([
            "code" => 404,
            "message" => "Geen Raspberry Pi gevonden."
        ]);

    if ($request->action == "light/switch") {
        $raspberrypiGpioPin = intval($dbh->query("SELECT gpio_pin FROM lamp WHERE id = " . intval($request->light))->fetchColumn());
        $request->gpio_pin = $raspberrypiGpioPin;
    } elseif ($request->action == "camera/switch") {

    }
}

$request->accepted = true;

if (isset($raspberrypiIp)) {
    // Generate URL
    $url = "http://" . $raspberrypiIp . "/?json=" . urlencode(json_encode($request));

    // Send request to Raspberry Pi
    #$response = intval(file_get_contents($url));
    $response = file_get_contents($url);

    if ($response == 200) {
        if ($request->action == "light/switch") {
            $dbh->query("
                UPDATE lamp
                SET status = " . $request->status . "
                WHERE id = " . $request->light);
        }
        if ($request->action == "camera/switch") {
            $dbh->query("
                UPDATE camera
                SET status = " . $request->status . "
                WHERE woning = " . $request->woning);
        }

        response([
            "code" => 200,
            "message" => "Succesvolle opdracht!",
            "rpi" => $response,
        ]);
    } else {
        response([
            "code" => 500,
            "message" => "Fout bij Raspberry Pi!",
            "url" => $url,
            "request" => $request,
            "response" => $response,
        ]);
    }
}

if ($request->action == "emergency") {
    $dbh->query("
        INSERT INTO hulpoproep (
            timestamp,
            gebruiker
        ) VALUES (
            " . time() . ",
            " . $request->from . "
        );");

    response([
        "code" => 200,
        "message" => "Succesvolle opdracht!"
    ]);
}
