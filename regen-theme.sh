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

for js in compiled-js html5shiv respond; do
    ./node_modules/.bin/uglifyjs -nc -v js/$js.js > js/$js.tmp.min.js
    mv js/$js.tmp.min.js js/$js.min.js
done

