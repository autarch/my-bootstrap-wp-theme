(function () {
     var instrumentFrontPagePhotos = function () {
         if (! jQuery("#front-page-photos").length ) {
             return;
         }

         var cookie_name = 'exploreveg-front-page-photos';

         var photos = jQuery(".front-page-photo");

         var image_num = 0;
         if ( jQuery.cookie(cookie_name) ) {
             image_num = parseInt( jQuery.cookie(cookie_name), 10 ) + 1;
             if ( image_num >= photos.length ) {
                 image_num = 0;
             }
         }

         photos.hide();
         jQuery( "#front-page-photo-" + image_num ).show();

         jQuery.cookie( cookie_name, image_num, { expires: 365 } );
     };

     jQuery(document).ready(
         function () {
             instrumentFrontPagePhotos();
         }
     );
})();
