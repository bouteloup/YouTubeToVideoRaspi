#!/bin/bash

#Test le contenu des paramètres. Lance la vidéo Yt si OK.
for param in "$@"
do
	omxplayer -o hdmi $(youtube-dl -t -f 22 -g $param)
done