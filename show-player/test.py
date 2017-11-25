import time
from pygame import mixer

print("At least I'm doing something")

mixer.pre_init(44100, -16, 2, 2048)
print("Did pre init")
mixer.init()
print("Did init")
mixer.music.load("/var/www/html/show-server/show-player/WizardsInWinter.mp3")

print("About to play")

mixer.music.play()

start = time.time()
current = 0

while True:
	current = time.time() - start
	if(current > 3):
		print("Finished")
                mixer.music.stop()
		break;

print("All done")
