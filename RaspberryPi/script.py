import os
import sys
import RPi.GPIO as GPIO

# Order arguments
program_arguments = sys.argv[1:]
arguments = {"options": []}

for value in program_arguments:
    if value[0] == "-":
        key = value[1:]

        arguments[key] = []
    elif "key" in locals():
        arguments[key].append(value)
    else:
        arguments["options"].append(value)

print(arguments)

# Argument init
if "action" not in arguments:
    sys.exit("No action")

# GPIO init
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)

# Execute
if arguments["action"][0] == "light/switch":
	# Format arguments
	arguments["gpio_pin"] = int(arguments["gpio_pin"][0])
	arguments["status"] = bool(int(arguments["status"][0]))

	GPIO.setup(arguments["gpio_pin"], GPIO.OUT)
	GPIO.output(arguments["gpio_pin"], arguments["status"])

if arguments["action"][0] =  "camera/switch":
	print("camera/switch")

	if arguments["status"] == 0:
		os.system("motion stop")
	else:
		os.system("motion restart")

print("200")
