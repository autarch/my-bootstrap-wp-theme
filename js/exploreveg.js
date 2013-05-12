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

     var instrumentWPCF7Form = function (id) {
         var marker = $( "#" + id );
         if ( ! marker.length ) {
             return;
         }

         var container = marker.parent().parent();
         var form = container.find("form");

         form.find(".wpcf7-response-output").detach();

         var modal = $( "#" + id + "-modal" );

         var displayModal = function (title) {
             modal.find("h3").text(title);

             var response = $.parseJSON( form.data("jqxhr").responseText );
             console.log(response);
             modal.find(".modal-body").children().detach();
             modal.find(".modal-body").append( '<p>' + response.message + '</p>' );
             modal.modal("show");
         };

         container.on(
             "mailsent.wpcf7",
             function () {
                 displayModal("Success!");
             }
         ).on(
             "mailfailed.wpcf7",
             function () {
                 displayModal("Error");
             }
         );
     };

     $(document).ready(
         function () {
             instrumentFrontPagePhotos();

             var subscribe = instrumentWPCF7Form("announce-subscribe");
             $('#announce-subscribe input[name="your-email"]').attr( "placeholder", "Email" );
             
             instrumentWPCF7Form("vsk-request");
         }
     );
})();
