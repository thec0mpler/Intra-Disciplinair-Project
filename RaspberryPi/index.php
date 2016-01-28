<?php
require_once "validate.php";

$arguments = "";

foreach ($request as $key => $value) {
	$arguments .= "-" . $key . " " . $value . " "; 
}

// var_dump($arguments);

$opdracht = "python /home/pi/Intra-Disciplinair-Project/RaspberryPi/script.py " . $arguments;

// var_dump($opdracht);
echo shell_exec($opdracht);
?>
