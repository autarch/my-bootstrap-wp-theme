(function () {
     var $ = jQuery;

     var instrumentFrontPagePhotos = function () {
         if (! $("#front-page-photos").length ) {
             return;
         }

         var cookie_name = 'exploreveg-front-page-photos';

         var photos = $(".front-page-photo");

         var image_num = 0;
         if ( $.cookie(cookie_name) ) {
             image_num = parseInt( $.cookie(cookie_name), 10 ) + 1;
             if ( image_num >= photos.length ) {
                 image_num = 0;
             }
         }

         photos.hide();
         $( "#front-page-photo-" + image_num ).show();

         $.cookie( cookie_name, image_num, { expires: 365 } );
     };

     var instrumentSubscribeForm = function () {
         $("#announce-subscribe-form .wpcf7-response-output").detach();

         var form = $("#announce-subscribe-form form");
         form.find('input[name="your-email"]').attr( "placeholder", "Email" );

         var subscribeModal = $("#announce-subscribe-response");

         $("#announce-subscribe-form .wpcf7").on(
             "mailsent.wpcf7",
             function () {
                 var response = $.parseJSON( form.data("jqxhr").responseText );
                 subscribeModal.find("#announce-subscribe-response-header").text("Success!");
                 subscribeModal.find("#announce-subscribe-response-text").text( response.message );
                 subscribeModal.modal('show');
             }
         );

         $("#announce-subscribe-form .wpcf7").on(
             "mailfailed.wpcf7",
             function () {
                 var response = $.parseJSON( form.data("jqxhr").responseText );
                 subscribeModal.find("#announce-subscribe-response-header").text("Error");
                 subscribeModal.find("#announce-subscribe-response-text").text( response.message );
                 subscribeModal.modal('show');
             }
         );
     };

     $(document).ready(
         function () {
             instrumentFrontPagePhotos();
             instrumentSubscribeForm();
         }
     );
})();
