import glob
import os
import subprocess
import time
import datetime
from threading import Thread
import urllib2

#define IP of Raspberry Pi and port on which is the stream
stream_ip = "http://192.168.0.100:8081"

fps = "10.0"
os.chdir("VIDEO")

#function for saving video from stream
def save_video():
    current_date_time = time.strftime("%Y%m%d_%I%M%S")
    save_initial_path = "video_file_" + current_date_time + ".mp4"

    #execute the arguments in terminal to save video
    save_video = subprocess.Popen(["ffmpeg", "-r", fps, "-f", "mjpeg", "-i", stream_ip, save_initial_path])
    time.sleep(10)
    #stop saving in current file
    save_video.terminate()

#function for merging video
def merge_video():
    date_yesterday = str(datetime.datetime.now() - datetime.timedelta(days=1))
    date_yesterday = date_yesterday[:10].replace("-", "")
    current_date_time = time.strftime("%Y%m%d_%I%M%S")
    date_time = time.strftime("%Y%m%d")
    output_after_merge = "output_" + current_date_time + ".mp4"

    #initalize list and specify text file name
    file_list = []
    text_file_name = "videolist_" + date_time + ".txt"
    text_file = open(text_file_name, "w")

    #search for every .mp4 file in current directory
    for file in glob.glob("*.mp4"):
        file_list.append("file '" + file + "'")
    text_file.write("\n".join(file_list))
    text_file.close()

    #merge video
    subprocess.call(["ffmpeg", "-r", fps, "-f", "concat", "-i", text_file_name, "-c", "copy", "-y", output_after_merge])

    text_file = open(text_file_name, "r")
    #delete every video_file(...).mp4
    for file in text_file:
        if file[6:12] == "output":
            if file[13:21] == date_time:
                del_output_file = file[6:32]
                os.remove(del_output_file)
        elif file[6:16] == "video_file":
            del_video_file = file[6:36]
            os.remove(del_video_file)
    text_file.close()

#this function is necessary to delete the file of the day before yesterday
def delete_video():
    date_day_before_yesterday = str(datetime.datetime.now() - datetime.timedelta(days=2))
    date_day_before_yesterday = date_day_before_yesterday[:10].replace("-", "")
    #search for every .mp4 file in current directory
    for file in glob.glob("*.mp4"):
        if file[:15] == "output_" + date_day_before_yesterday:
            os.remove(file)
    #check every hour for a file of the day before yesterday is deleted, if not, delete
    time.sleep(3600)

#while loop to make sure program runs forever
while True:
    #check whether the camera is on
    try:
        url = urllib2.urlopen(stream_ip)
        #if the camera is on start saving and merging
        while True:
            Thread(target = delete_video).start()
            Thread(target = save_video).start()
            time.sleep(12)
            Thread(target = merge_video).start()
            #if camera is turned off while it was saving it now stops saving
            if IOError:
                break
    except IOError:
        print("Geen connectie, camera is uitgeschakeld")
    time.sleep(10)