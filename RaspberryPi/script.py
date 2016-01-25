import sys

# Order arguments
program_arguments = sys.argv[1:]
arguments = {}

for value in program_arguments:
    if value[0] == "-":
        key = value[1:]

        arguments[key] = []
    else:
        arguments[key].append(value)
