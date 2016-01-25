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

# Argument init
if "action" not in arguments:
	sys.exit("No action")

# GPIO init
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)

# Execute
if arguments["action"] == "light/switch":
	# Format arguments
	arguments["light"] = int(arguments["light"])
	arguments["status"] = bool(int(arguments["status"]))

	GPIO.setup(arguments["light"], GPIO.OUT)
	GPIO.output(arguments["light"], arguments["status"])

print(arguments)
