import gpio_player
import psutil
import os

PROCNAME = "python"

print("Killing")

gpio_player.set_state(0)

for proc in psutil.process_iter():
	# check whether the process name matches
	print(proc)
	if PROCNAME == proc.name() and proc.pid != os.getpid():
		proc.kill()

gpio_player.set_state(0)