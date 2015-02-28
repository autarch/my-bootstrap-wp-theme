#!/bin/bash

pushd bootswatch
grunt swatch:exploreveg
popd

cp bootswatch/exploreveg/bootstrap.css css/compiled-style.css

if [ ! -d fonts ]; then
    mkdir fonts
fi
cp ./bootswatch/bower_components/bootstrap/dist/fonts/* fonts

cat bootswatch/bower_components/bootstrap/dist/js/bootstrap.js \
    js/bootstrap-lightbox.js \
    js/the-bootstrap.js \
    js/exploreveg.js \
    > js/compiled-js.js

if [[ $(basename `pwd`) == "exploreveg-test" ]]; then
    SITE_ID=11
else
    SITE_ID=10
fi

CACHE_DIR=/var/www/admin.exploreveg.org/wp-content/cache/minify/0000${SITE_ID}

sudo rm $CACHE_DIR/*.js*
sudo rm $CACHE_DIR/*.css*
