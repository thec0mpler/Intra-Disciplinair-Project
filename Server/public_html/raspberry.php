<?php

if (isset($_GET['create'])) {
    $commands = [
        "from" => 101,
        "action" => "light/switch",
        "light" => 1,
        "status" => 1
    ];

    print("<pre>");
    var_dump($commands);
    print("</pre>");

    print("<pre>");
    print(json_encode($commands));
    print("</pre>");

    print("<pre>");
    print(urlencode(json_encode($commands)));
    print("</pre>");

    exit();
}


if (isset($_GET['commands'])) {
    $commands = json_decode($_GET['commands']);

    print("<pre>");
    var_dump($commands);
    print("</pre>");

    foreach ($commands as $command) {
        print("<pre><b>Command:</b>");
        print($command);
        print("<br><br><b>Output:</b> ");
        var_dump(shell_exec($command));
        print("</pre>");
    }
}

?>
