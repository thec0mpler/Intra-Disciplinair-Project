<?php
// Check for valid request
if (empty($_GET["json"]))
    response([
        "code" => 404,
        "message" => "Geen json-variable gevonden."
    ]);
else
    $json = $_GET["json"];

if (!$request = json_decode($json))
    response([
        "code" => 400,
        "message" => "Geen geldige JSON string."
    ]);

// Validate
$validParameters = [
    "light/switch" => [
        "required" => [
            "light" => [
                "type" => "int",
            ],
            "status" => [
                "type" => "int",
                "valid" => [0, 1],
            ],
        ],
        "optional" => [],
    ],
    "emergency" => [
        "required" => [],
        "optional" => [],
    ],
];

if (empty($request->from) || !is_int($request->from)) {
    response([
        "code" => 400,
        "message" => "Geen geldige `from` meegegeven."
    ]);
}

if (empty($request->action) || !array_key_exists($request->action, $validParameters)) {
    response([
        "code" => 400,
        "message" => "Geen geldige `action` meegegeven."
    ]);
}

if (!empty($validParameters[$request->action]["required"])) {
    foreach ($validParameters[$request->action]["required"] as $requiredKey => $options) {
        if (!array_key_exists($requiredKey, $request))
            response([
                "code" => 400,
                "message" => "Verplichte parameter niet meegeven: '" . $requiredKey . "'."
            ]);

        if (!empty($options["type"])) {
            if ($options["type"] === "int") {
                if (!is_int($request->$requiredKey))
                    response([
                        "code" => 400,
                        "message" => "Geen geldige waarde '" . $requiredKey . "': `"
                            . $request->$requiredKey . "`, integer verwacht."
                    ]);
            }
        }

        if (!empty($options["valid"])) {
            if (!in_array($request->$requiredKey, $options["valid"]))
                response([
                    "code" => 400,
                    "message" => "Geen geldige waarde '" . $requiredKey . "': `"
                        . $request->$requiredKey . "`."
                ]);
        }
    }
}
