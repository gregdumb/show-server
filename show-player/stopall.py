import gpio_player
import psutil
import os
import sys

PROCNAME = "python"

new_state = 0

if(len(sys.argv) >= 2):
	if(sys.argv[1] == "1"):
		new_state = 1

print("Killing")

for proc in psutil.process_iter():
	# check whether the process name matches
	#print(proc)
	if PROCNAME == proc.name() and proc.pid != os.getpid():
		proc.kill()

gpio_player.set_state(new_state)
