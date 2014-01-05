#/bin/bash

while [ true ]; do
    inotifywait -e modify -e create -e delete -e move --exclude '.#*' --exclude '#*#' -r less js ./regen-theme.sh
    ./regen-theme.sh
done
