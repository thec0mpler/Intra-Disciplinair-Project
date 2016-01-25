import RPi.GPIO as GPIO
import sys

#use first argument in terminal as number representing a light
GPIO_number = int(sys.argv[1])

#use second argument in terminal as number representing on or off (1=on, 0=off)
state = bool(int(sys.argv[2]))

#setmode and turn off warnings
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)

#setup pins
GPIO.setup(11, GPIO.OUT)

#regulate output
GPIO.output(GPIO_number, state)