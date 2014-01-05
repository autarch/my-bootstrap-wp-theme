#!/bin/bash

./node_modules/less/bin/lessc ./less/my-theme.less ./compiled-style.css
cp ./less/bootstrap/img/* img/

cat less/bootstrap/js/bootstrap-transition.js \
    less/bootstrap/js/bootstrap-alert.js \
    less/bootstrap/js/bootstrap-button.js \
    less/bootstrap/js/bootstrap-carousel.js \
    less/bootstrap/js/bootstrap-collapse.js \
    less/bootstrap/js/bootstrap-dropdown.js \
    less/bootstrap/js/bootstrap-modal.js \
    less/bootstrap/js/bootstrap-tooltip.js \
    less/bootstrap/js/bootstrap-popover.js \
    less/bootstrap/js/bootstrap-scrollspy.js \
    less/bootstrap/js/bootstrap-tab.js \
    less/bootstrap/js/bootstrap-typeahead.js \
    less/bootstrap/js/bootstrap-affix.js \
    js/bootstrap-lightbox.js \
    js/the-bootstrap.js \
    js/exploreveg.js \
    > js/compiled-js.js

for js in compiled-js html5shiv respond; do
    ./node_modules/uglify-js/bin/uglifyjs -nc -v js/$js.js > js/$js.tmp.min.js
    mv js/$js.tmp.min.js js/$js.min.js
done

