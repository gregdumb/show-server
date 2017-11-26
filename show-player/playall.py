import sys
import os
import time
import glob
import ntpath
import gpio_player

if(len(sys.argv) >= 3):
    SONG_FOLDER = sys.argv[1]
    SHOW_FOLDER = sys.argv[2]
else:
    SONG_FOLDER = "../data/audio/"
    SHOW_FOLDER = "../data/shows/"

LOOPING = False

if(len(sys.argv) > 3):
    if(sys.argv[3] == "1"):
        LOOPING = True

if(LOOPING):
    print("Looping")
else:
    print("Not looping")

show_query = SHOW_FOLDER + "*.txt"

show_list = (glob.glob(show_query))

while True:
    for showpath in show_list:
        # Get show filename and id
        showfile = ntpath.basename(showpath)
        showid = os.path.splitext(showfile)[0]
        
        print("Playing " + showid)
        songpath = glob.glob(SONG_FOLDER + showid + ".*")[0]
        
        gpio_player.play_show(songpath, showpath)
        
        time.sleep(10)
    
    if(LOOPING != True):
        break

